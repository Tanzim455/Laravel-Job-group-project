<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyVerify extends Model
{
    use HasFactory;

    protected $table = "company_verifies";
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'company_id',
        'token',
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
