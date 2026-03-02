<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikeController extends Controller
{
    public function show($id)
    {
        $bike = Bike::findOrFail($id);
        return view('bike-details', compact('bike'));
    }
}