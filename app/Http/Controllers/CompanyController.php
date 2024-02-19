<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
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
            'website'=>$request->url
        ]);

        

        
    }
}
