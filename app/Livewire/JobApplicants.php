<?php

namespace App\Livewire;

use App\Models\AppliedJob;
use App\Models\Job;
use Livewire\Component;

class JobApplicants extends Component
{
    public Job $job;
    // public function mount(Job $job){

    // }
    public function render()

    {  
        
        $jobApplicants=$this->job;
        $appliedJobs=AppliedJob::with('user')?->where('job_id',$jobApplicants->id)->paginate(10);
         
        return view('livewire.job-applicants',compact('appliedJobs'));
    }
}
