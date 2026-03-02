<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class HomeController extends Controller
{
    public function index()
{
    $bikes = Bike::inRandomOrder()->take(3)->get();
    return view('home', compact('bikes'));
}


public function selectCity(Request $request)
{
    $city = $request->city;

    if ($city) {
        $bikes = Bike::where('city', $city)->take(3)->get();
    } else {
        $bikes = Bike::inRandomOrder()->take(3)->get();
    }

    return view('home', compact('bikes', 'city'));
}
}
