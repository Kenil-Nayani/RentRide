<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bikes = Bike::all();
        return view('admin.bikes.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bikes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:50',
            'status' => 'required|string|in:Available,Unavailable,Maintenance',
            'city' => 'required|string|max:100',
            'price_per_day' => 'required|integer|min:0',
            'engine' => 'nullable|string|max:50',
            'gear' => 'nullable|string|max:50',
            'mileage' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Consistent with public/images logic used on frontend
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Bike::create($data);

        return redirect()->route('admin.bikes.index')->with('success', 'Bike added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bike = Bike::findOrFail($id);
        return view('admin.bikes.edit', compact('bike'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bike = Bike::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:50',
            'status' => 'required|string|in:Available,Unavailable,Maintenance',
            'city' => 'required|string|max:100',
            'price_per_day' => 'required|integer|min:0',
            'engine' => 'nullable|string|max:50',
            'gear' => 'nullable|string|max:50',
            'mileage' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $bike->update($data);

        return redirect()->route('admin.bikes.index')->with('success', 'Bike updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bike = Bike::findOrFail($id);
        // Note: Image deletion from public/images is excluded for simplicity unless requested
        $bike->delete();

        return redirect()->route('admin.bikes.index')->with('success', 'Bike deleted successfully.');
    }
}
