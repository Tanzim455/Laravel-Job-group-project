<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyVerify;

class VerifyController extends Controller
{
    public function verifyAccount($token)
    {
        $verifyCompany = CompanyVerify::where('token', $token)->firstOrFail();

        $company = $verifyCompany->company;

        if ($company->email_verified_at != null) {
            $message = "Your e-mail is already verified";
            
            return redirect()->route('company.login')->with('success', $message);
        }

        $verifyCompany->company->email_verified_at = now();
        $verifyCompany->company->save();
        $message = "Your e-mail is verified";

        return redirect()->route('company.login')->with('success', $message);
    }
}
