<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikeController extends Controller
{

    public function index(Request $request)
    {
        $city = $request->city;

        if ($city) {
            $bikes = Bike::where('city', $city)->get();
        } else {
            $bikes = Bike::all();
        }

        return view('bikes', compact('bikes','city'));
    }

    public function show($id)
    {
        $bike = Bike::findOrFail($id);

        return view('bike-details', compact('bike'));
    }

}