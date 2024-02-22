<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalCandidates = User::count();
        $unverifiedCandidates = User::whereNull('email_verified_at')->count();
        $verifiedCandidates = User::whereNotNull('email_verified_at')->count();
        $totalCompanies = Company::count();
        $disApprovedCompanies = Company::where('is_approved', false)->count();
        $approvedCompanies = Company::where('is_approved', true)->count();
        $unverifiedCompanies = Company::whereNull('email_verified_at')->count();
        $verifiedCompanies = Company::whereNotNull('email_verified_at')->count();
        $newRegisteredCompanies = Company::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalCandidates', 'unverifiedCandidates', 'verifiedCandidates',
            'totalCompanies', 'disApprovedCompanies', 'approvedCompanies', 
            'unverifiedCompanies', 'verifiedCompanies', 'newRegisteredCompanies'
        ));
    }
}
