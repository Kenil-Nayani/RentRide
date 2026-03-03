@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<section class="profile-section">
    <div class="container">
        <div class="profile-card">

            <div class="profile-header">
                <h3>Edit Profile</h3>
                <p>Update your personal details</p>
            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom:15px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="profile-body">

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="profile-row">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="profile-row">
                        <label>Driving License Number</label>
                        <input type="text" name="license_number" value="{{ old('license_number', $user->license_number) }}">
                    </div>

                    <div class="profile-row">
                        <label>License Expiry Date</label>
                        <input type="date" name="license_expiry" value="{{ old('license_expiry', $user->license_expiry) }}">
                    </div>

                    <div class="profile-row">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="{{ old('dob', $user->dob) }}">
                    </div>

                    <div class="profile-row">
                        <label>Address</label>
                        <textarea name="address">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <div class="profile-row">
                        <label>City</label>
                        <input type="text" name="city" value="{{ old('city', $user->city) }}">
                    </div>

                    <div class="profile-row">
                        <label>State</label>
                        <input type="text" name="state" value="{{ old('state', $user->state) }}">
                    </div>

                    <div class="profile-row">
                        <label>Pincode</label>
                        <input type="text" name="pincode" value="{{ old('pincode', $user->pincode) }}">
                    </div>

                    <div class="profile-row">
                        <label>Emergency Contact</label>
                        <input type="text" name="emergency_contact" value="{{ old('emergency_contact', $user->emergency_contact) }}">
                    </div>

                    <div class="profile-row">
                        <label>Profile Photo</label>
                        <input type="file" name="profile_photo">
                    </div>

                    <div style="text-align:center; margin-top:20px;">
                        <button type="submit" class="btn btn-primary">
                            Update Profile
                        </button>
                        <a href="{{ route('profile') }}" class="btn btn-secondary" style="margin-left:10px;">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</section>

@endsection