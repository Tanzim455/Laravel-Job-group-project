<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_admin_login_screen_can_be_rendered(): void
    {
        $response = $this->get(route('admin.loginview'));

        $response->assertViewIs('admin.login');
    }
    public function test_admins_can_authenticate_using_the_admin_login_screen(): void
    {
        $this->withoutExceptionHandling();
        $admin = Admin::factory()->create();
        $this->assertEquals(1,Admin::count());
        $response=$this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'password',
        ]);
        
         $this->actingAs($admin, 'admin');
         $this->assertAuthenticated();
           $response->assertRedirectToRoute('admin.dashboard');
        
    }
    public function test_unauthenticated_user_cannot_enter_the_admin_dashboard():void{
        // $this->withoutExceptionHandling();
        $response=$this->post(route('admin.login'), [
            'email' =>'',
            'password' =>'',
        ]);
        $response->assertSessionHasErrors();
        // $response->assertStatus(302);
        
    }
    public function test_user_with_wrong_credentials_will_be_redirected_to_admin_login_page():void{
         //$this->withoutExceptionHandling();
      
        $admin = Admin::factory()->create();
        $this->assertEquals(1,Admin::count());
        $response=$this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'wrong-password',
        ]);
        // $response->assertStatus(302);
        $response->assertRedirectToRoute('admin.loginview');
        
    }

    public function test_guest_user_entering_admin_dashboard_will_be_redirected():void{
        
        $response = $this->get(route('admin.dashboard'));
    
        $response->assertRedirect(route('admin.loginview'));
    }
    public function test_user_with_web_guard_entering_admin_dashboard_will_be_redirected():void{
        
        $user = User::factory()->create();

         $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $response = $this->get(route('admin.dashboard'));
    
        $response->assertRedirect(route('admin.loginview'));
        
    }
    
}
