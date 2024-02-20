<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
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
        'is_approved'
    ];
}
