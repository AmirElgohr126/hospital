<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
        'is_active',
    ];

    public $translatedAttributes = [
        'name',
        'biography',
        'specialization',
        'appointment_schedule',
    ];



    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
