<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class JobList extends Component
{
    public Job $job;
    public function delete(Job $job){
    
        $job->delete();
     }
    public function render()
    {
        $jobs=Job::select('id','title','min_experience','max_experience','min_salary','max_salary',
        'qualification','apply_url','job_location','job_location_type'
        )->paginate(10);
    return view('livewire.job-list',compact('jobs'));
        
    }
}
