<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_create_job_render_function_returns_a_view(){
        Livewire::test(CreateJob::class)
        
        ->assertViewIs('livewire.create-job');
    }
}
