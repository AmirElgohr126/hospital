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
        'schedule_from',
        'schedule_to',
        'phone',
        'email',
        'is_active',
        'section_id',
    ];

    public $translatedAttributes = [
        'name',
        'biography',
    ];



    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function days(){
        return $this->belongsToMany(Day::class,'doctor_day');
    }
}
