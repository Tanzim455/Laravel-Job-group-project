<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i <= 20; $i++) {
            // code...
            DB::table('job_tag')->insert([
                'tag_id' => fake()->numberBetween(1, Tag::count()),
                'job_id' => fake()->numberBetween(1, Job::count()),
            ]);
        }

    }
}
