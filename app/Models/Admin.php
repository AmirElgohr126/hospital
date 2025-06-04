<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
class Admin extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'role',
        'status',
        'profile_picture',
        'phone',
        'address',
        'city',
        'country',
        'postal_code',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
