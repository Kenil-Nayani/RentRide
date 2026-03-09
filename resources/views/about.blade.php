@extends('layouts.main')

@section('content')
<div class="container" style="margin-top:100px; max-width:1000px;">

    <!-- Title -->
    <div class="mb-4">
        <h1 class="fw-bold">About RentRide</h1>
        <hr>
    </div>

    <!-- Intro -->
    <p class="lead">
        RentRide is a smart and reliable bike rental service designed to make
        daily travel easy, affordable, and convenient.
    </p>

    <p>
        Whether you are a student, working professional, or traveler, RentRide
        provides well-maintained bikes that help you move around the city without
        hassle. Our platform focuses on simplicity, transparency, and customer satisfaction.
    </p>

    <!-- Two Column Section -->
    <div class="row mt-5">
        <div class="col-md-6 mb-4">
            <h4 class="fw-semibold">Our Mission</h4>
            <p>
                To provide a dependable and eco-friendly transportation option
                that saves time, reduces travel costs, and promotes sustainable mobility.
            </p>
        </div>

        <div class="col-md-6 mb-4">
            <h4 class="fw-semibold">Our Vision</h4>
            <p>
                To become a trusted bike rental platform across India by offering
                reliable service, affordable pricing, and a seamless user experience.
            </p>
        </div>
    </div>

    <!-- Features Section -->
    <div class="mt-4">
        <h4 class="fw-semibold">Why Choose RentRide?</h4>

        <ul class="mt-3" style="line-height: 1.9;">
            <li><strong>Affordable Plans:</strong> Budget-friendly rental options for everyone.</li>
            <li><strong>Easy Booking:</strong> Simple and fast online reservation process.</li>
            <li><strong>Well-Maintained Bikes:</strong> Regular servicing ensures safety and comfort.</li>
            <li><strong>Flexible Rental Duration:</strong> Rent by hour, day, or week.</li>
            <li><strong>24/7 Support:</strong> Dedicated customer support whenever you need help.</li>
        </ul>
    </div>

</div>
@endsection