<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Livewire\Livewire;
use Tests\TestCase;

class SingleJobShowTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function job_creation_by_company(?int $times = 1)
    {
        $category = Category::factory()->create();
        $company = Company::factory()->create();
        Livewire::actingAs($company, 'company');
        Job::factory(
            $times,
            [
                'category_id' => $category->id,
                'company_id' => $company->id,
            ]

        )->create();

    }

    public function test_user_can_see_details_on_single_job_page(): void
    {

        $this->job_creation_by_company();
        $job = Job::select('id', 'title', 'description')->first();
        $response = $this->get(route('job.show', ['job' => $job->id]));

        $response->assertOk()
            ->assertViewIs('job.show')
            ->assertSee([
                'title' => $job->title,
                'description' => $job->description,
                'min_experience' => $job->min_experience,
                'max_experience' => $job->max_experience,
                'min_salary' => $job->min_salary,
                'max_salary' => $job->max_salary,
                'qualification' => $job->qualification,

                'job_location' => $job->job_location,
                'job_location_type' => $job->job_location_type,

            ]);

    }
}
