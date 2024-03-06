<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AppliedJob extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'asking_salary', 'CV', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($appliedJob) {
            // Set the company_id based on the authenticated company user
            if ($user = Auth::user()) {
                // Set the company_id based onwe the authenticated company user
                $appliedJob->user_id = $user?->id;
            }
        });
    }
}
