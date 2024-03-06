<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobShowController extends Controller
{
    //
    public function show(Job $job)
    {

        return view('job.show', compact('job'));

    }
}
