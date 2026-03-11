<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'is_admin',

        // Profile Fields
        'license_number',
        'license_expiry',
        'dob',
        'address',
        'city',
        'state',
        'pincode',
        'emergency_contact',
        'profile_photo'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'license_expiry' => 'date',
        'dob' => 'date',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}