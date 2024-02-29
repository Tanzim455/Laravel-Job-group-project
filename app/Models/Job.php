<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    public $fillable=['title','description','min_experience','max_experience','min_salary','max_salary','apply_url',
    'expiration_date','job_location','job_location_type','category_id','company_id','qualification'
];
public function category(){
    return $this->belongsTo(Category::class);
}   
public function company(){
return $this->belongsTo(Company::class);
}

public function tags()
{
return $this->belongsToMany(Tag::class)->as('tags');
}
}
