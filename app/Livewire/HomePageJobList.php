<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomePageJobList extends Component
{
    public function render()
    {
        $jobs = DB::table('jobs AS j1')
    ->select(
        'j1.company_id',
        'j1.description',
        'j1.title',
        'j1.id',
        'j1.min_experience',
        'j1.max_experience',
        'j1.min_salary',
        'j1.max_salary',
        'j1.apply_url',
        'j1.qualification',
        'j1.expiration_date',
        'j1.job_location',
        'j1.job_location_type',
        'companies.name AS company_name',
        'categories.name AS category_name',
        'tags.name AS tag_name' // Include the tag name
    )
    ->join('companies', 'companies.id', '=', 'j1.company_id')
    ->join('categories', 'categories.id', '=', 'j1.category_id')
   
    
    ->where('j1.expiration_date', '>=', Carbon::now()->format('Y-m-d'))
    ->whereRaw('(
        SELECT COUNT(*)
        FROM jobs AS j2
        WHERE j2.company_id = j1.company_id
        AND j2.expiration_date > NOW()
        AND j2.id <= j1.id
    ) <= 3')
    ->get();


        dd($jobs);
        
        return view('livewire.home-page-job-list',compact('jobs'));
    }
}
