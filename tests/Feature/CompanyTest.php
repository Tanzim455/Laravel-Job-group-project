<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
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
    $response = $this->get(route('company.loginview'));
    $response->assertViewIs('company.login');
    $response->assertStatus(200);
      
   }



public function test_company_can_authenticate_using_the_company_login_screen_who_are_approved(): void
    {
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();
        $company->update([
          'is_approved'=>true
        ]);
        
        $this->assertEquals(1,Company::count());
        $response=$this->post(route('company.login'), [
            'email' => $company->email,
            'password' => 'password',
        ]);
        
          $this->actingAs($company, 'company');
          $this->assertAuthenticated();
           $response->assertRedirectToRoute('company.dashboard');
        
    }
    public function test_unapproved_companies_cannot_authenticate(): void
    {
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();
        
        
       
        $response=$this->post(route('company.login'), [
            'email' => $company->email,
            'password' => 'password',
        ]);
        
          $this->actingAs($company, 'company');
          $this->assertAuthenticated();
           $response->assertRedirectToRoute('company.loginview');
        
    }

    public function test_company_dashboard_screen_can_be_rendered_for_authenticated_companies(): void
    {
        
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();
        // $this->assertEquals(1,Company::count());
        $response=$this->post(route('company.login'), [
            'email' => $company->email,
            'password' => 'password',
        ]);
        
          $this->actingAs($company, 'company');
          $response = $this->get(route('company.dashboard'));
          $response->assertViewIs('company.dashboard');
    }
    public function test_unauthenticated_user_cannot_enter_the_company_dashboard():void{
        // $this->withoutExceptionHandling();
        $response=$this->post(route('company.login'), [
            'email' =>'',
            'password' =>'',
        ]);
        $response->assertSessionHasErrors();
        // $response->assertStatus(302);
        
    }
    public function test_company_with_wrong_credentials_will_be_redirected_to_company_login_page():void{
        //$this->withoutExceptionHandling();
     
       $admin = Company::factory()->create();
       $this->assertEquals(1,Company::count());
       $response=$this->post(route('company.login'), [
           'email' => $admin->email,
           'password' => 'wrong-password',
       ]);
       // $response->assertStatus(302);
       $response->assertRedirectToRoute('company.loginview');
       
   }
   public function test_guest_user_entering_company_dashboard_will_be_redirected():void{
        
    $response = $this->get(route('company.dashboard'));

    $response->assertRedirectToRoute('company.loginview');
}
public function test_user_with_web_guard_entering_company_dashboard_will_be_redirected():void{
        
    $user = User::factory()->create();

    $this->actingAs($user, 'web');
    $response = $this->get(route('company.dashboard'));

    $response->assertRedirectToRoute('company.loginview');
    
}
public function test_user_with_admin_guard_entering_company_dashboard_will_be_redirected():void{
        
    $admin = Admin::factory()->create();

    $this->actingAs($admin, 'admin');
    $response = $this->get(route('company.dashboard'));

    $response->assertRedirectToRoute('company.loginview');
    
}
public function test_authenticated_companies_cannot_visit_company_login_page():void{
    $this->withoutExceptionHandling();
    $company = Company::factory()->create();

    $this->actingAs($company, 'company');
    $response = $this->get(route('company.loginview'));
    // $response->assertStatus(302);
     //$response->assertRedirectToRoute('admin.dashboard');
     $response->assertRedirect();
    
}

}
