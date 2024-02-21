<?php

namespace App\Livewire\Company\Auth;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class Register extends Component
{
    public $name, $email, $website, $password, $password_confirmation;

    protected function rules()
    {
        return [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['unique:companies','email','required'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'website'=>['required','url']
        ];
    }

    public function resetFields(){
        $this->name = '';
        $this->email = '';
        $this->website = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.company.auth.register');
    }

    public function register()
    {
        $this->validate(); 

        Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success','Registration Successful. Please verify email!');

        $this->resetFields();
        
    }
}
