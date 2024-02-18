<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    // public function test_there_is_admin_dashboard():void{
    //     $this->withoutExceptionHandling();
    //     $response = $this->get('/admindashboard');
    //     $response->assertOk();
    // }
    public function test_admins_can_authenticate_using_the_admin_login_screen(): void
    {
        $this->withoutExceptionHandling();
        $admin = Admin::factory()->create();
        $this->assertEquals(1,Admin::count());
        $response=$this->post(route('adminlogin'), [
            'email' => $admin->email,
            'password' => 'password',
        ]);
        
         $this->actingAs($admin, 'admin');
         $this->assertAuthenticated();
           $response->assertRedirectToRoute('admin.dashboard');
        
    }
    public function test_unauthenticated_user_cannot_enter_the_admin_dashboard(){
        // $this->withoutExceptionHandling();
        $response=$this->post(route('adminlogin'), [
            'email' =>'',
            'password' =>'',
        ]);
        $response->assertSessionHasErrors();
        // $response->assertStatus(302);
        
    }
    public function test_user_with_wrong_credentials_will_be_redirected_to_admin_login_page(){
         //$this->withoutExceptionHandling();
      
        $admin = Admin::factory()->create();
        $this->assertEquals(1,Admin::count());
        $response=$this->post(route('adminlogin'), [
            'email' => $admin->email,
            'password' => 'wrong-password',
        ]);
        // $response->assertStatus(302);
        $response->assertRedirectToRoute('admin.login');
        
    }

    public function test_guest_user_entering_admin_dahboard_will_be_redirected(){
        $this->withoutExceptionHandling();
        $response = $this->get(route('admin.dashboard'));
    
        $response->assertRedirect(route('admin.login'));
    }
    
}
