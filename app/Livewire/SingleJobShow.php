<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class SingleJobShow extends Component
{
    public Job $job;
    public function render()
    {
        return view('livewire.single-job-show');
    }
}
