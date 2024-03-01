<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table = 'jobs';
    // public static $location_type=['remote','onsite','hybrid'];
    public $fillable=['title','description','min_experience','max_experience','min_salary','max_salary','apply_url',
    'expiration_date','job_location','job_location_type','category_id','qualification','company_id'
];
public function category(){
    return $this->belongsTo(Category::class);
}   
public function company(){
return $this->belongsTo(Company::class);
}

public function tags()
{
return $this->belongsToMany(Tag::class);
}
protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            // Set the company_id based on the authenticated company user
            $job->company_id = Auth::guard('company')->user()->id;
        });
    }
}
