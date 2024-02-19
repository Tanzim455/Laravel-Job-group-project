<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_company_can_register_using_registration_screen(): void
    {
        $response = $this->get(route('company.create'));
        $response->assertViewIs('company.create');
        $response->assertStatus(200);
    }
   public function test_company_can_register():void
   {
    $this->withoutExceptionHandling();
     $company=Company::factory()->make()->toArray();
     $company['password_confirmation']=$company['password'];
    
    $response = $this->post(route('company.register'), $company);
    $response->assertOk();
     $this->assertEquals(1,Company::count());
     $this->assertDatabaseHas('companies',[
        'name'=>$company['name'],
        'email'=>$company['email'],
        'website'=>$company['website']
         
     ]);
   }
  
   public function test_company_has_a_login_screen()
   {
    $this->withoutExceptionHandling();
    $response = $this->get(route('company.login'));
    $response->assertViewIs('company.login');
    $response->assertStatus(200);
      
   }



}
