<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyRegistrationFieldsValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_registration_fields_of_company(){
        $response = $this->post(route('company.register'), [
            'name'=>'',
            'email'=>'company1@gmail.com',
             'password'=>'password',
             'website'=>'websitename'
            
        ]);
    
        // $response->assertSessionHasErrors(['name','website']);
        $response->assertInvalid(['name','website'])
        ->assertValid('email');
       }
       public function test_company_cannot_register_with_already_existing_email(){
        $company=Company::factory()->create()->toArray();
        
        $response = $this->post(route('company.register'),$company);
        $response->assertInvalid('email');
        // $response->assertSessionHasErrors(['name','website']);
        
       }
       public function test_company_cannot_register_if_password_and_confirmed_dont_match(){
        $company=Company::factory()->make()->toArray();
        
     $company['password_confirmation']='password';
        $response = $this->post(route('company.register'),$company);
        $response->assertInvalid('password');
        // $response->assertSessionHasErrors(['name','website']);
        
       }
}
