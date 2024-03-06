<?php

namespace App\Livewire;

use Livewire\Component;

class AppliedJobsListofUser extends Component
{
    public function render()
    {
        $appliedJobs = auth()->user()->appliedJobs()->with('job', 'user')->paginate(10);

        return view('livewire.applied-jobs-listof-user', compact('appliedJobs'));
    }
}
