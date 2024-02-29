<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Category;
use App\Models\Admin;
use App\Models\Category as ModelsCategory;
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
    public function admin_login(){
        $admin = Admin::factory()->create();
       
        Livewire::actingAs($admin,'admin');
    }
    public function test_category_route_is_only_available_to_admin(){
        
        $this->withoutExceptionHandling();
        $this->admin_login();
         
           
           $response=$this->get(route('category'));

           $response->assertOk();
    }
    public function test_category_route_is_not_only_available_to_user_with_web_guard(){
        
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        Livewire::actingAs($user);
         $response=$this->get(route('category'));

           $response->assertRedirect();
    }
    public function test_category_route_is_not_only_available_to_user_with_company_guard(){
        
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();
        Livewire::actingAs($company);
         $response=$this->get(route('category'));

           $response->assertRedirect();
    }

    public function test_category_must_have_a_name(){
       
        $this->admin_login();
        $response=Livewire::test(Category::class)
        ->call('savecategory')
        ->set('name','');

        $response->assertHasErrors('name');

    }
    public function test_name_field_must_be_unique_for_posting_a_category(){
         $this->admin_login();
        $category=ModelsCategory::factory()->make()->toArray();
            
       
        $response=Livewire::test(Category::class)
         ->set($category)
         ->call('savecategory');
          $lastCategoryName=ModelsCategory::first()->name;
          
           $secondCategory=ModelsCategory::factory([
             'name'=>$lastCategoryName
           ])->make()->toArray();
          $response->assertHasNoErrors('name');
           $response2=Livewire::test(Category::class)
          ->set($secondCategory)
          ->call('savecategory');
           $response2->assertHasErrors('name');
         
             
    }
    public function test_admin_can_create_a_category(){
       
        $this->admin_login();
        $category=ModelsCategory::factory()->make()->toArray();
            
       
       Livewire::test(Category::class)
        ->set($category)
        ->call('savecategory');
           
            $this->assertEquals(1,ModelsCategory::count());
         $this->assertDatabaseHas('categories',$category);
    }
    public function test_all_categories_can_be_seen_by_companies_from_their_dashboard(){
        $this->admin_login();
        $category1=ModelsCategory::factory()->create();
        $category2=ModelsCategory::factory()->create();
        Livewire::test(Category::class)
        ->assertSee([
            'name'=>$category1->name,
            
        ])
        ->assertSee([
            'name'=>$category2->name
        ])
        ->assertViewHas('categories')
        
        ;
    }
    public function test_admin_can_update_a_category()
        {
            $this->admin_login();
            $category=ModelsCategory::factory()->create();
            
            
            $response = Livewire::test(Category::class)
                ->set('category', $category) // Set the job property
                ->set('name', 'Updated Category') // Set the title property
                ->call('update',$category->id); // Now you can call the update method
             
            $response->assertOk();
             
              $this->assertNotEquals($category->name,'Updated Category');
              $this->assertEquals($category->fresh()->name,'Updated Category');

              $this->assertDatabaseHas('categories',[
                'name'=>$category->fresh()->name
          ]);
          $this->assertDatabaseMissing('categories',[
             'name'=>$category->name,
             
       ]);


    
}
}