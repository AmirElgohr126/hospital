<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Day extends Model
{
    use HasFactory,Translatable;

    protected $fillable = ['key'];

    public $translatedAttributes = ['name'];


    public function doctors(){
        return $this->belongsToMany(Doctor::class,'doctor_day');
    }
}
