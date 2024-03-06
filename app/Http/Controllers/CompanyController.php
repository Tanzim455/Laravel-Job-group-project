<?php

namespace App\Http\Controllers;

use App\Mail\Company\ApprovalEmail;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class CompanyController extends Controller
{
    public function create()
    {
        return view('company.create');
    }

    public function register(Request $request): void
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['unique:companies', 'email', 'required'],
            'password' => ['required', Rules\Password::defaults(), 'confirmed'],
            'website' => ['required', 'url'],
        ]);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'website' => $request->website,
        ]);
    }

    public function loginView()
    {
        return view('company.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::guard('company')->attempt($credentials)) {
    //         $company = Company::where('email', $credentials['email'])->first();

    //         if ($company->is_approved) {
    //             return redirect()->route('company.dashboard');
    //         }

    //         return redirect()->route('company.loginview');
    //     }

    //     return redirect()->route('company.loginview');
    // }

    public function dashboard()
    {
        return view('company.dashboard');
    }

    public function verifiedCompanies()
    {
        $verifiedCompanies = Company::whereNotNull('email_verified_at')
            ->where('is_approved', false)
            ->paginate(10);

        return view('admin.verified-company', compact('verifiedCompanies'));
    }

    public function approveCompany(Company $company)
    {
        $company->update(['is_approved' => true]);

        Mail::to($company->email)->send(new ApprovalEmail(company: $company));

        return redirect()->back()->with('success', 'Approval Successful');
    }

    public function approvedCompanies()
    {
        $approvedCompanies = Company::where('is_approved', true)
            ->paginate(10);

        return view('admin.approved-company', compact('approvedCompanies'));
    }

    public function logout(Request $request)
    {
        if (Auth::guard('company')->check()) { // this means that the admin was logged in.
            Auth::guard('company')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('company.login');
        }
    }
}
