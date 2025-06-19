<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Doctor extends Model implements TranslatableContract
{
    use HasFactory , Translatable;

    protected $fillable = [
        'name',
        'biography',
        'specialization',
        'appointment_schedule',
        'phone',
        'email',
        'profile_picture',
        'is_active',
    ];

    public $translatedAttributes = [
        'name',
        'biography',
        'specialization',
        'appointment_schedule',
    ];
}
