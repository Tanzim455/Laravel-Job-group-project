<?php

namespace App\Livewire;

use App\Models\AppliedJob;
use App\Models\Job;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyJob extends Component
{
    use WithFileUploads;

    public Job $job;

    public $CV;

    public $job_id;

    public $asking_salary;

    public function mount(Job $job)
    {
        $this->job_id = $job->id;
    }

    public function applyJobs()
    {

        $this->validate([
            'asking_salary' => 'required',
            'CV' => 'required|file|mimes:pdf|max:2048',

        ]);
        $file = $this->CV;

        $path = $file->store('cvs', 'public');

        AppliedJob::create([

            'asking_salary' => $this->asking_salary,
            'CV' => $path,
            'job_id' => $this->job_id,
        ]);

        session()->flash('success', 'You have successfully applied for this job');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.apply-job');
    }
}
