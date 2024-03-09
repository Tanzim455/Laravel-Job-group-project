<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobView;
use Carbon\Carbon;
use Livewire\Component;

class SingleJobShow extends Component
{
    public Job $job;

    public function render()
    {
        $userViewJob = JobView::where('user_id', auth()->user()?->id)
            ->where('job_id', $this->job?->id)->exists();
        $idofCompany=Job::with('company')->findorFail($this->job?->id)->company->id;
        $company = Company::findOrFail($idofCompany);
$companyJobIds = $company->jobs()->where('expiration_date', '>=', Carbon::now()->format('Y-m-d'))->pluck('id')->take(3);

        //  $currentjobId=$this->job?->id;
        //  if($companyJobIds->contains($currentjobId)){
        //     dd("It has the id");
        //  }else{
        //     dd("It doesnt have the id");
        //  }
        if (auth()->user() && ! $userViewJob) {
            JobView::create([
                'user_id' => auth()->user()?->id,
                'job_id' => $this->job->id,
            ]);
        }

        return view('livewire.single-job-show',compact('companyJobIds'));
    }
}
