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
            // Indian DL Format: 2 Letters (State), 2 Digits (RTO), 4 Digits (Year), 7 Digits (Unique) = 15 chars total
            'license_number' => ['required', 'string', 'size:15', 'regex:/^[A-Z]{2}[0-9]{2}[0-9]{4}[0-9]{7}$/i'],
            'license_expiry' => 'required|date|after:today',
            'dob' => 'required|date|before:-18 years',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|digits:6',
            'emergency_contact' => 'required|digits:10',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'license_number.regex' => 'The Driving License must be exactly 15 characters (e.g. MH0420191234567: 2 State Letters, 2 RTO Digits, 4 Year Digits, 7 Unique Digits).',
            'license_number.size' => 'The Driving License must be exactly 15 characters long.'
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