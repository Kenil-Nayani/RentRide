<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show Profile Page
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Show Edit Profile Page
    public function editProfile()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10',
            'license_number' => 'required|string|max:50',
            'license_expiry' => 'required|date|after:today',
            'dob' => 'required|date|before:-18 years',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|digits:6',
            'emergency_contact' => 'required|digits:10',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->update($request->except('profile_photo'));

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}