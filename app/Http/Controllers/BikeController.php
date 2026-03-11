<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikeController extends Controller
{

    public function index(Request $request)
    {
        $query = Bike::query();

        // 1. Filter by Location / City
        if ($request->has('city') && $request->city != '') {
            $query->where('city', $request->city);
        }

        // 2. Filter by Minimum Price
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price_per_day', '>=', $request->min_price);
        }

        // 3. Filter by Maximum Price
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        // 4. Filter by Bike Type (Scooty vs Bike based on Gear)
        if ($request->has('type') && is_array($request->type)) {
            $types = $request->type;
            
            $query->where(function ($q) use ($types) {
                // If the user selected 'Scooty', find gear with 'Automatic'
                if (in_array('Scooty', $types)) {
                    $q->orWhere('gear', 'like', '%Automatic%');
                }
                // If the user selected 'Bike', find gear without 'Automatic'
                if (in_array('Bike', $types)) {
                    $q->orWhere('gear', 'not like', '%Automatic%');
                }
            });
        }

        // 5. Sorting Logic
        if ($request->has('sort') && $request->sort != '') {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price_per_day', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price_per_day', 'desc');
            } elseif ($request->sort == 'newest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'popular') {
                $query->orderBy('id', 'desc');
            }
        }

        // Fetch the filtered and sorted bikes from the database
        $bikes = $query->get();

        // Pass all variables back to the view so the filters stay selected
        return view('bikes', [
            'bikes' => $bikes,
            'city' => $request->city,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'types' => $request->type ?? [],
            'sort' => $request->sort
        ]);
    }

    public function show($id)
    {
        $bike = Bike::findOrFail($id);

        return view('bike-details', compact('bike'));
    }

}