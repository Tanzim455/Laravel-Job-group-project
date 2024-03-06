<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateJob;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateJobTest extends TestCase
{
    /** @test */
    use RefreshDatabase;

    public function test_create_job_component_exists()
    {
        Livewire::test(CreateJob::class)
            ->assertStatus(200);
    }

    public function test_create_job_render_function_returns_a_view()
    {
        Livewire::test(CreateJob::class)
            ->assertViewIs('livewire.create-job');
    }

    public function category_company_job_creation()
    {
        $category = Category::factory()->create();
        $company = Company::factory()->create();

        Livewire::actingAs($company, 'company');
        Job::factory(
            [
                'category_id' => $category->id,
                'company_id' => $company->id,
            ]

        )->create();

    }

    public function test_only_authenticated_company_can_visit_this_route()
    {
        $company = Company::factory()->create();
        Livewire::actingAs($company, 'company');
        $response = $this->get(route('jobs.create'));
        $response->assertOk();
    }

    public function test_company_can_post_a_job()
    {
        $company = Company::factory()->create();
        Livewire::actingAs($company, 'company');

        $category = Category::factory()->create();
        $job = Job::factory([
            'category_id' => $category['id'],
            'company_id' => $company['id'],
        ])->make()->toArray();

        Livewire::test(CreateJob::class)
            ->set($job)
            ->call('save');

        $this->assertEquals(1, Job::count());
        $this->assertDatabaseHas('jobs', $job);
    }

    public function test_a_job_can_be_posted_by_company_alongside_tags()
    {
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();
        Livewire::actingAs($company, 'company');

        Tag::factory(5)->create();
        //  dump($tags);
        $tagsIds = Tag::pluck('id')->sort();

        $category = Category::factory()->create();
        $job = Job::factory([
            'category_id' => $category['id'],
            'company_id' => $company['id'],
        ])->make()->toArray();

        Livewire::test(CreateJob::class)
            ->set($job)
            ->set('tags', [$tagsIds[0], $tagsIds[1], $tagsIds[2]])
            ->call('save');

        $this->assertEquals(1, Job::count());

        //  $latestJobId=Job::where('id',1)->first()->pluck('id')[0];
        $latestJobId = Job::latest()->first()->id;

        $this->assertDatabaseHas('job_tag', [
            'job_id' => $latestJobId,
            'tag_id' => $tagsIds[0],
        ]);
        $this->assertDatabaseHas('job_tag', [
            'job_id' => $latestJobId,
            'tag_id' => $tagsIds[1],
        ]);
        $this->assertDatabaseHas('job_tag', [
            'job_id' => $latestJobId,
            'tag_id' => $tagsIds[2],
        ]);

    }

    public function test_category_belongs_to_a_job()
    {

        $this->category_company_job_creation();

        $latestJob = Job::latest()->first();

        $this->assertInstanceOf(Category::class, $latestJob->category);

    }

    public function test_company_belongs_to_a_job()
    {

        $this->category_company_job_creation();

        $latestJob = Job::latest()->first();

        $this->assertInstanceOf(Company::class, $latestJob->company);
    }
}
