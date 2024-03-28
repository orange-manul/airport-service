<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', // код аэропорта
        'city_ru', // название города на русском
        'city_en', // название города на английском
        'area', // область
        'country', // код страны
        'timezone', // часовой пояс
    ];


}
