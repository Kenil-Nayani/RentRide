<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'model',
        'fuel_type',
        'status',
        'city',
        'price_per_day',
        'engine',
        'gear',
        'mileage',
        'image'
    ];

    /**
     * Get all bookings for this bike.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
