<?php

namespace App\Livewire\Company\Auth;

use App\Mail\Company\VerificationEmail;
use App\Models\Company;
use App\Models\CompanyVerify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Register extends Component
{
    public $name;

    public $email;

    public $website;

    public $password;

    public $password_confirmation;

    protected function rules()
    {
        return [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['unique:companies', 'email', 'required'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'website' => ['required', 'url'],
        ];
    }

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->website = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function register()
    {

        DB::transaction(function () {
            $this->validate();

            $company = Company::create([
                'name' => $this->name,
                'email' => $this->email,
                'website' => $this->website,
                'password' => Hash::make($this->password),
            ]);

            $token = Str::random(64);
            $id = $company->id;

            CompanyVerify::create([
                'company_id' => $id,
                'token' => $token,
            ]);

            Mail::to($this->email)->send(new VerificationEmail($token));

            session()->flash('success', 'Registration Successful. Please verify email!');

            $this->resetFields();
        });

    }

    public function render()
    {
        return view('livewire.company.auth.register');
    }
}
