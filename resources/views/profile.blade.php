@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<section class="profile-section">

    <div class="container">

        <div class="profile-card">

            <div class="profile-header">

                <div class="profile-avatar">
                    {{ strtoupper(substr($user->name,0,1)) }}
                </div>

                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>

            </div>


            <div class="profile-body">

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

            </div>

        </div>

    </div>

</section>

@endsection