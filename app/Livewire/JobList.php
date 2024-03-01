<?php

namespace App\Livewire;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobList extends Component
{
    public Job $job;
    public function delete(Job $job){
    
        $job->delete();
     }
    public function render()
    {
        $jobs=Job::with('category','tags')
        ->where('company_id',Auth::guard('company')->user()?->id)
        ->select('id','title','min_experience','max_experience','min_salary','max_salary',
         'qualification','apply_url','job_location','job_location_type','expiration_date','category_id'
         )
        ->get();
       
    return view('livewire.job-list',compact('jobs'));
        
    }
}
