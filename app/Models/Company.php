<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;

    protected $guard = 'company';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'license_no',
        'registration_paper',
        'address',
        'website',
        'linkedin',
        'is_approved',
        'email_verified_at',
    ];
}
