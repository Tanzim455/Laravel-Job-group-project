<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\JobView;
use Livewire\Component;

class SingleJobShow extends Component
{
    public Job $job;
    public function render()
    {
        $userViewJob=JobView::where('user_id',auth()->user()?->id)
        ->where('job_id',$this->job?->id)->exists();
       
        if(auth()->user() &&  !$userViewJob){
            JobView::create([
                  'user_id'=>auth()->user()?->id,
                  'job_id'=>$this->job->id
            ]);
        }
        return view('livewire.single-job-show');
    }
}
