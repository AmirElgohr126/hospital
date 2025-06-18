<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Section extends Model implements TranslatableContract
{


    use HasFactory, Translatable;
    protected $fillable = [
        'name',
    ];

    public $translatedAttributes = [
        'name',
    ];
}
