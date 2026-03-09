@extends('layouts.main')

@section('content')

<section class="hero-section">

    <div class="container hero-content">

        <!-- LEFT -->
       <div class="hero-text">

    <h1>Book Your Dream Bike Today</h1>

    <p>
        Choose from premium bikes & scooters at affordable prices.
        Safe, fast and reliable rentals across India.
    </p>

    <a href="{{ route('bikes') }}" class="btn btn-yellow">
        Browse Bikes
    </a>

</div>

        <div class="hero-image">
            <img src="images/hero.jpeg" alt="Bike">
        </div>

    </div>

</section>
<section class="bikes-section">

    <div class="container">

        <!-- Section Heading -->
        <div class="section-header text-center">
            <h2>Our Featured Rides</h2>
            <p>Discover our most popular bikes, ready to take you on your next adventure.</p>
        </div>

       <div class="row g-4">

@foreach($bikes as $bike)

<div class="col-lg-4">
    <div class="bike-card" id="bikeContainer">

        <div class="bike-image">
            <img src="{{ asset('images/' . $bike->image) }}" alt="">
        </div>

        <div class="bike-info">

            <h4>{{ $bike->name }}</h4>

            <div class="price">
                ₹{{ $bike->price_per_day }} <span>/ day</span>
            </div>

            <ul class="bike-specs">

                <li>
                    <span>Engine</span>
                    <strong>{{ $bike->engine }}</strong>
                </li>

                <li>
                    <span>Gear</span>
                    <strong>{{ $bike->gear }}</strong>
                </li>

                <li>
                    <span>Mileage</span>
                    <strong>{{ $bike->mileage }}</strong>
                </li>

                <li>
                    <span>Location</span>
                    <strong>{{ $bike->city }}</strong>
                </li>

            </ul>

            <a href="{{ route('bikes', ['city' => $bike->city]) }}"
               class="btn btn-yellow w-100">
                Rent Now
            </a>

        </div>

    </div>
</div>

@endforeach

</div>


</section>

@endsection
