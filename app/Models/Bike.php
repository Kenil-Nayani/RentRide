<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
        'name',
        'city',
        'price_per_day',
        'engine',
        'gear',
        'mileage',
        'image'
    ];
}
