@extends('layouts.admin')

@section('content')

<div class="row g-4">

    <div class="col-md-3">
        <div class="admin-card">
            <h5>Total Users</h5>
            <h3>{{ $totalUsers }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="admin-card">
            <h5>Total Bikes</h5>
            <h3>{{ $totalBikes }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="admin-card">
            <h5>Total Bookings</h5>
            <h3>{{ $totalBookings }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="admin-card">
            <h5>Total Revenue</h5>
            <h3>₹{{ $totalRevenue }}</h3>
        </div>
    </div>

</div>


<div class="admin-welcome-card">

    <h2>Welcome to RentRide Admin</h2>

    <p>
        Manage your bike rental business efficiently with real-time analytics
        and comprehensive management tools.
    </p>

</div>

@endsection