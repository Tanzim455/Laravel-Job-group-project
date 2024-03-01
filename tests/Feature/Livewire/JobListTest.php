<?php

namespace Tests\Feature\Livewire;

use App\Livewire\JobList;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class JobListTest extends TestCase
{
    /** @test */
    use RefreshDatabase;
    public function test_job_list_component_exists()
    {
        Livewire::test(JobList::class)
            ->assertStatus(200);
    }
    
    public function test_job_list_component_renders_a_view(){
       
        Livewire::test(JobList::class)
        
        ->assertViewIs('livewire.job-list');
    }
        public function test_job_list_component_exists_for_specific_route_for_authenticated_companies(){
            $company=Company::factory()->create();
            Livewire::actingAs($company,'company');
            $this->get(route('companyjobs.index'))
           ->assertSeeLivewire(JobList::class);
        } 
        public function test_job_list_route_of_company_cant_be_visisted_by_admin()
        {
            $admin=Admin::factory()->create();
            Livewire::actingAs($admin,'admin');
            $this->get(route('companyjobs.index'))
           ->assertRedirect();
        }
        public function test_job_list_route_of_company_cant_be_visisted_by_user()
        {
            $user=User::factory()->create();
            Livewire::actingAs($user,'web');
            $this->get(route('companyjobs.index'))
           ->assertRedirect();
        }
        public function job_creation_by_company(?int $times=1){
            $category=Category::factory()->create();
            $company=Company::factory()->create();
            Livewire::actingAs($company,'company');
             Job::factory(
                $times,
                [
                    'category_id'=>$category->id,
                    'company_id'=>$company->id
                ]
                
             )->create();
             
        } 
        public function test_all_jobs_can_be_seen_by_companies_from_their_dashboard(){
            $this->withoutExceptionHandling();
            // 
          $this->job_creation_by_company(times:2);
             
              $job1=Job::select('id','title','min_experience','max_experience','min_salary','max_salary',
              'qualification','apply_url','job_location','job_location_type'
              )->first();
            //find last id
           
            $job2=Job::select('id','title','min_experience','max_experience','min_salary','max_salary',
            'qualification','apply_url','job_location','job_location_type'
            )->orderBy('id','desc')->first();
            Livewire::test(JobList::class)
            ->assertSee([
                'title'=>$job1->title,
                'min_experience'=>$job1->min_experience,
                'max_experience'=>$job1->max_experience,
                'min_salary'=>$job1->min_salary,
                'max_salary'=>$job1->max_salary,
                'qualification'=>$job1->qualification,
                
                'job_location'=>$job1->job_location,
                'job_location_type'=>$job1->job_location_type
                 
            ])
            ->assertSee([
                'title'=>$job2->title,
                'min_experience'=>$job2->min_experience,
                'max_experience'=>$job2->max_experience,
                'min_salary'=>$job2->min_salary,
                'max_salary'=>$job2->max_salary,
                'qualification'=>$job2->qualification,
                
                'job_location'=>$job2->job_location,
                'job_location_type'=>$job2->job_location_type
                 
            ])
            ->assertViewHas('jobs')
            
            ;
        }
        public function test_jobs_can_be_deleted(){
            $this->withoutExceptionHandling();
           
            $this->job_creation_by_company();
            $job=Job::select('id','title','description')->first();
        Livewire::test(JobList::class)
            ->call('delete', $job->id);
            
            $deletedJob = Job::withTrashed()->find($job->id);
            $this->assertNotNull($deletedJob->deleted_at);
            $this->assertSoftDeleted('jobs', ['id' => $job->id]);
            
            
        }
    }

