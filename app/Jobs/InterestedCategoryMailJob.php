<?php

namespace App\Jobs;

use App\Mail\InterestedJobCategoryMail;
use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class InterestedCategoryMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;
    protected Job $jobInstance;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, Job $jobInstance)
    {
        $this->user = $user;
        $this->jobInstance = $jobInstance;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        $email = new InterestedJobCategoryMail(user: $this->user, job: $this->jobInstance);
        Mail::to($this->user['email'])->send($email);
    }
}

