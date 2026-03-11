@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<section class="profile-section">

    <div class="container">

        <div class="profile-card">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom:15px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="profile-header">

                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                         alt="Profile Photo" 
                         class="profile-image">
                @else
                    <div class="profile-avatar">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>
                @endif

                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>

            </div>


            <div class="profile-body">

                <!-- Personal Information -->
                <h5 style="margin-top: 10px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; color: #555;">Personal Information</h5>
                <div class="profile-row">
                    <label>Name</label>
                    <span>{{ $user->name }}</span>
                </div>

                <div class="profile-row">
                    <label>Email</label>
                    <span>{{ $user->email }}</span>
                </div>

                <div class="profile-row">
                    <label>Phone</label>
                    <span>{{ $user->phone ?? 'Not Added' }}</span>
                </div>
                
                <div class="profile-row">
                    <label>Date of Birth</label>
                    <span>
                        {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d M Y') : 'Not Added' }}
                    </span>
                </div>

                <!-- Driving License Details -->
                <h5 style="margin-top: 30px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; color: #555;">Driving License Details</h5>
                <div class="profile-row">
                    <label>Driving License</label>
                    <span>{{ $user->license_number ?? 'Not Added' }}</span>
                </div>

                <div class="profile-row">
                    <label>License Expiry</label>
                    <span>
                        @if($user->license_expiry)
                            @if(\Carbon\Carbon::parse($user->license_expiry)->isPast())
                                <span style="color:red;">
                                    {{ \Carbon\Carbon::parse($user->license_expiry)->format('d M Y') }} (Expired)
                                </span>
                            @else
                                {{ \Carbon\Carbon::parse($user->license_expiry)->format('d M Y') }}
                            @endif
                        @else
                            Not Added
                        @endif
                    </span>
                </div>

                <!-- Address Information -->
                <h5 style="margin-top: 30px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; color: #555;">Address Information</h5>
                <div class="profile-row">
                    <label>Address</label>
                    <span>{{ $user->address ?? 'Not Added' }}</span>
                </div>

                <div class="profile-row">
                    <label>City</label>
                    <span>{{ $user->city ?? 'Not Added' }}</span>
                </div>

                <div class="profile-row">
                    <label>State</label>
                    <span>{{ $user->state ?? 'Not Added' }}</span>
                </div>

                <div class="profile-row">
                    <label>Pincode</label>
                    <span>{{ $user->pincode ?? 'Not Added' }}</span>
                </div>

                <div class="profile-row">
                    <label>Emergency Contact</label>
                    <span>{{ $user->emergency_contact ?? 'Not Added' }}</span>
                </div>

                {{-- Edit Button --}}
                <div style="text-align:center; margin-top:35px;">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        Edit Profile
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection