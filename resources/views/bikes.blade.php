@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bikes.css') }}">
@endpush
@extends('layouts.main')

@section('content')

    <section class="bikes-page">

        <div class="container">

            <!-- Heading -->
            <div class="page-header text-center">
                <h2>Browse Bikes</h2>
                <p>Find Your Perfect Ride</p>
            </div>

            <!-- Search Bar -->
            <div class="bike-search-box">

                <form method="GET" action="{{ route('bikes') }}" class="bike-search-form">

                    <select name="city" class="form-control">

                        <option value="">Select City</option>
                        <option value="Surat" {{ ($city == 'Surat') ? 'selected' : '' }}>Surat</option>
                        <option value="Ahmedabad" {{ ($city == 'Ahmedabad') ? 'selected' : '' }}>Ahmedabad</option>
                        <option value="Goa" {{ ($city == 'Goa') ? 'selected' : '' }}>Goa</option>

                    </select>

                    <button class="btn btn-yellow">
                        Browse
                    </button>

                </form>

            </div>

            <!-- Bike Cards -->
            <div class="row g-4 mt-4">

                @foreach($bikes as $bike)

                    <div class="col-lg-4">
                        <div class="bike-card">

                            <div class="bike-image">
                                <img src="{{ asset('images/' . $bike->image) }}" alt="">
                            </div>

                            <div class="bike-info">

                                <h4>{{ $bike->name }}</h4>

                                <div class="price">
                                    ₹{{ $bike->price_per_day }} <span>/ day</span>
                                </div>

                                <ul class="bike-specs">

                                    <li><span>Engine</span><strong>{{ $bike->engine }}</strong></li>
                                    <li><span>Gear</span><strong>{{ $bike->gear }}</strong></li>
                                    <li><span>Mileage</span><strong>{{ $bike->mileage }}</strong></li>
                                    <li><span>Location</span><strong>{{ $bike->city }}</strong></li>

                                </ul>

                                <a href="{{ route('bike.details', $bike->id) }}" class="btn btn-yellow w-100">
                                    Rent Now
                                </a>

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

    </section>

@endsection