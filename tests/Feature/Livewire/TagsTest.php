<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Tags;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TagsTest extends TestCase
{
    /** @test */
    use RefreshDatabase;
    public function test_tags_component_is_rendered()
    {
        Livewire::test(Tags::class)
            ->assertStatus(200);
    }
    public function test_render_function_returns_a_view(){
        Livewire::test(Tags::class)
        
        ->assertViewIs('livewire.tags');
    }
    public function admin_login(){
        $admin = Admin::factory()->create();
       
        Livewire::actingAs($admin,'admin');
    }
    public function test_tags_route_is_only_available_to_admin(){
        
        $this->withoutExceptionHandling();
        $this->admin_login();
         
           
           $response=$this->get(route('tags'));

           $response->assertOk();
    }
    public function test_tags_route_is_not_only_available_to_user_with_web_guard(){
        
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        Livewire::actingAs($user);
         $response=$this->get(route('category'));

           $response->assertRedirect();
    }
    public function test_tags_route_is_not_only_available_to_user_with_company_guard(){
        
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();
        Livewire::actingAs($company);
         $response=$this->get(route('category'));

           $response->assertRedirect();
    }
    public function test_name_field_is_required_for_posting_a_job(){
        $this->admin_login();
        $response=Livewire::test(Tags::class)
        ->call('savetags')
        ->set('name','');

        $response->assertHasErrors('name');
    }
    public function test_admin_can_create_a_tag(){
        $this->withoutExceptionHandling();
        $this->admin_login();
        $tag=Tag::factory()->make()->toArray();
            
       
        Livewire::test(Tags::class)
        ->set($tag)
        ->call('savetags');
           
         $this->assertEquals(1,Tag::count());
        $this->assertDatabaseHas('tags',$tag);
    }
    public function test_there_must_be_unique_name_field_for_creating_a_tag(){
     $this->withoutExceptionHandling();
     $this->admin_login();
     $tag=Tag::factory()->make()->toArray();
         
   
     $response=Livewire::test(Tags::class)
      ->set($tag)
      ->call('savetags');
       $lastTagName=Tag::first()->name;
      dump($lastTagName);
        $response->assertHasNoErrors('name');
        
        
        $tag2=Tag::factory([
         'name'=>$lastTagName
       ])->make()->toArray();
       
     $response2=Livewire::test(Tags::class)
      ->set($tag2)
      ->call('savetags');
     $response2->assertHasErrors('name');
      $this->assertEquals(1,Tag::count());
     
          
 }
 public function test_all_tags_can_be_seen_by_admins_from_their_dashboard(){
    $this->admin_login();   
    $tag1=Tag::factory()->create();
    $tag2=Tag::factory()->create();
    Livewire::test(Tags::class)
    ->assertSee([
        'name'=>$tag1->name,
        
    ])
    ->assertSee([
        'name'=>$tag2->name
    ])
    ->assertViewHas('tags')
    
    ;
}
public function test_admins_can_update_a_tag()
        {
            $this->admin_login();
            $tag=Tag::factory()->create();
            
            
            $response = Livewire::test(Tags::class)
                ->set('tag', $tag) // Set the job property
                ->set('name', 'Updated tag') // Set the title property
                ->call('update',$tag->id); // Now you can call the update method
             
            $response->assertOk();
             
              $this->assertNotEquals($tag->name,'Updated tag');
              $this->assertEquals($tag->fresh()->name,'Updated tag');

              $this->assertDatabaseHas('tags',[
                'name'=>$tag->fresh()->name
          ]);
          $this->assertDatabaseMissing('categories',[
             'name'=>$tag->name,
             
       ]);
        }
}
