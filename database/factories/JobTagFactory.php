<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'job_id' => fake()->randomNumber(1, Job::count()),
            'tag_id' => fake()->randomNumber(1, Tag::count()),
        ];
    }
}
