<?php

namespace App\Livewire;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobList extends Component
{
    public Job $job;
    public function delete(Job $job){
         
        $job->delete();
        session()->flash('success', 'Job has been deleted successfully');
     }
    public function render()
    {
        $jobs=Job::with('category','tags')
        ->where('company_id',Auth::guard('company')->user()?->id)
        ->select('id','title','min_experience','max_experience','min_salary','max_salary',
         'qualification','apply_url','job_location','job_location_type','expiration_date','category_id'
         )->withCount('appliedJobs')
         ->withCount('jobViews')
        ->paginate(10);
           
        $idsOfJobsActive=Job::with('category','tags')
        
        ->where('company_id',Auth::guard('company')->user()?->id)
        ->where('deleted_at',NULL)
        ->where('expiration_date','>=',Carbon::now()->format('Y-m-d'))
        ->take(3)
        ->pluck('id')->toArray();
       
       
    return view('livewire.job-list',compact('jobs','idsOfJobsActive'));
        
    }
}
