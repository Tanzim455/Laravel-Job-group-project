<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterestedJobCategory extends Model
{
    use HasFactory;
    protected $fillable=['user_id','category_id'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($interestedCategory) {
            // Set the company_id based on the authenticated company user
            if ($authUser =auth()->user()) {
                // Set the company_id based on the authenticated company user
                $interestedCategory->user_id = $authUser?->id;
            }
        });
    }
}

