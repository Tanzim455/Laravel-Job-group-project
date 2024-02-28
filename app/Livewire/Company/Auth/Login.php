<?php

namespace App\Livewire\Company\Auth;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public  $email, $password;
   
    public function companylogin()
    {
    //    dump($this->email);
    //    dump($this->password);
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('company')->attempt($credentials)) {
            $company = Company::where('email', $credentials['email'])->first();
            
            if ($company->is_approved) {
                return redirect()->route('company.dashboard');
            }

            return redirect()->route('company.login');
        }else{
            dd("Info is wrong");
        }
    }
        public function render()
        {
            return view('livewire.company.auth.login');
        }
    }

