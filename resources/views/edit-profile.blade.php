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

                    <!-- Personal Information -->
                    <h5 style="margin-top: 10px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; color: #555;">Personal Information</h5>
                    <div class="profile-row">
                        <label>Phone <span style="color:red">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" placeholder="Enter phone number" required>
                    </div>

                    <div class="profile-row">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="{{ old('dob', $user->dob) }}" max="{{ date('Y-m-d') }}">
                    </div>
                    
                    <div class="profile-row" style="align-items: flex-start;">
                        <label style="margin-top: 10px;">Profile Photo</label>
                        <div style="flex: 1;">
                            @if($user->profile_photo)
                                <div style="margin-bottom: 10px;">
                                    <span style="font-size: 13px; color: #777; display: block; margin-bottom: 5px;">Current Photo:</span>
                                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Current Profile Photo" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #eee;">
                                </div>
                            @endif
                            <span style="font-size: 13px; color: #777; display: block; margin-bottom: 5px;">Upload New Photo:</span>
                            <input type="file" name="profile_photo">
                        </div>
                    </div>

                    <!-- Driving License Details -->
                    <h5 style="margin-top: 30px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; color: #555;">Driving License Details</h5>
                    <div class="profile-row">
                        <label>Driving License Number <span style="color:red">*</span></label>
                        <input type="text" style="text-transform: uppercase;" name="license_number" value="{{ old('license_number', $user->license_number) }}" maxlength="15" pattern="[A-Za-z]{2}[0-9]{13}" title="Format: 2 State Letters, 2 RTO Digits, 4 Year Digits, 7 Unique Digits (e.g. MH0420191234567)" placeholder="Enter driving license number (e.g. MH0420191234567)" required>
                    </div>

                    <div class="profile-row">
                        <label>License Expiry Date</label>
                        <input type="date" name="license_expiry" value="{{ old('license_expiry', $user->license_expiry) }}">
                    </div>

                    <!-- Address Information -->
                    <h5 style="margin-top: 30px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; color: #555;">Address Information</h5>
                    <div class="profile-row">
                        <label>Address <span style="color:red">*</span></label>
                        <textarea name="address" placeholder="Enter your address" required>{{ old('address', $user->address) }}</textarea>
                    </div>

                    <div class="profile-row">
                        <label>City <span style="color:red">*</span></label>
                        <input type="text" name="city" value="{{ old('city', $user->city) }}" placeholder="Enter city" required>
                    </div>

                    <div class="profile-row">
                        <label>State</label>
                        <input type="text" name="state" value="{{ old('state', $user->state) }}" placeholder="Enter state">
                    </div>

                    <div class="profile-row">
                        <label>Pincode</label>
                        <input type="text" name="pincode" value="{{ old('pincode', $user->pincode) }}" maxlength="6" pattern="\d{6}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);" placeholder="Enter 6-digit pincode">
                    </div>

                    <div class="profile-row">
                        <label>Emergency Contact</label>
                        <input type="text" name="emergency_contact" value="{{ old('emergency_contact', $user->emergency_contact) }}" maxlength="10" pattern="\d{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" placeholder="Enter emergency phone number">
                    </div>

                    <div style="text-align:center; margin-top:30px;">
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