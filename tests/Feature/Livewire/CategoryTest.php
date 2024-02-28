<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Category;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /** @test */
     /** @test */
     use RefreshDatabase;
     public function test_category_component_exists()
     {
         Livewire::test(Category::class)
             ->assertStatus(200);
     }
    
    public function test_render_function_returns_a_view(){
        Livewire::test(Category::class)
        
        ->assertViewIs('livewire.category');
    }

    public function test_category_route_is_only_available_to_admin(){
        
        $this->withoutExceptionHandling();
        $admin = Admin::factory()->create();
       
        $response=$this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'password',
        ]);
        
         $this->actingAs($admin, 'admin');
         
           
           $response=$this->get(route('category'));

           $response->assertOk();
    }
    public function test_category_route_is_not_only_available_to_user_with_web_guard(){
        
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
       $this->actingAs($user, 'web');
         $response=$this->get(route('category'));

           $response->assertRedirect();
    }
    public function test_category_route_is_not_only_available_to_user_with_company_guard(){
        
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();
       $this->actingAs($company, 'company');
         $response=$this->get(route('category'));

           $response->assertRedirect();
    }
}
