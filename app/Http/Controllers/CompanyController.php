<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class CompanyController extends Controller
{
    //
    public function create(){
        return view('company.create');
    }
    public function register(Request $request):void
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['unique:companies','email','required'],
            'password' => ['required', Rules\Password::defaults(),'confirmed'],
            'website'=>['required','url']
        ]);

        $user =Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'website'=>$request->website
        ]);
}
      
public function loginView(){
    return view('company.login');
}
public function login(Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::guard('company')->attempt($credentials)) {
        return redirect()->route('company.dashboard');
    }

    return redirect()->route('company.loginview');
}

public function dashboard(){
    return view('company.dashboard');
}
}
