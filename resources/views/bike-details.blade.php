@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('css/bike-details.css') }}">

<section class="bd-page">

    <div class="container">

        <div class="row bd-main">

            <!-- LEFT SIDE -->
            <div class="col-lg-7">

                <!-- Image -->
                <div class="bd-image-card">
                    <img src="{{ asset('images/'.$bike->image) }}" alt="{{ $bike->name }}">
                </div>

                <!-- Specifications -->
                <div class="bd-section">

                    <h4 class="bd-section-title">Specifications</h4>

                    <div class="bd-spec-grid">

                        <div class="bd-spec">
                            <div class="bd-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M3 13h4l3-4h4l2 3h5v5h-2" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <div class="bd-label">Engine</div>
                                <div class="bd-value">{{ $bike->engine }}</div>
                            </div>
                        </div>

                        <div class="bd-spec">
                            <div class="bd-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                    <path d="M19 12h2M3 12h2M12 19v2M12 3v2" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <div class="bd-label">Gear</div>
                                <div class="bd-value">{{ $bike->gear }}</div>
                            </div>
                        </div>

                        <div class="bd-spec">
                            <div class="bd-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/>
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <div class="bd-label">Mileage</div>
                                <div class="bd-value">{{ $bike->mileage }}</div>
                            </div>
                        </div>

                        <div class="bd-spec">
                            <div class="bd-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 21s7-4.5 7-10a7 7 0 10-14 0c0 5.5 7 10 7 10z"
                                          stroke="currentColor" stroke-width="2"/>
                                    <circle cx="12" cy="11" r="2.5"
                                            stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <div class="bd-label">City</div>
                                <div class="bd-value">{{ $bike->city }}</div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Description -->
                <div class="bd-section">

                    <h4 class="bd-section-title">Description</h4>

                    <p class="bd-description">
                        Experience the thrill of riding the {{ $bike->name }}.
                        Designed for comfort, performance, and reliability.
                        Perfect for both city rides and long journeys.
                    </p>

                </div>

                <!-- Ride Perks -->
                <div class="bd-section">

                    <h4 class="bd-section-title">Ride Perks</h4>

                    <div class="bd-perks">

                        <div class="bd-perk">
                            <div class="bd-perk-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 2l7 4v6c0 5-3.5 8-7 10-3.5-2-7-5-7-10V6l7-4z"
                                          stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <span>Helmet Included</span>
                        </div>

                        <div class="bd-perk">
                            <div class="bd-perk-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 8v4l3 3" stroke="currentColor" stroke-width="2"/>
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <span>24/7 Support</span>
                        </div>

                        <div class="bd-perk">
                            <div class="bd-perk-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M4 12h16M12 4v16" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <span>Instant Booking</span>
                        </div>

                        <div class="bd-perk">
                            <div class="bd-perk-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 20l9-5-9-5-9 5 9 5z"
                                          stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <span>Comfortable Ride</span>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE BOOKING -->
            <div class="col-lg-5">

                <div class="bd-book-card">

                    <h3 class="bd-bike-name">{{ $bike->name }}</h3>

                    <div class="bd-price">
                        ₹{{ $bike->price_per_day }}
                        <span>/ day</span>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success mt-2 mb-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger mt-2 mb-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('bike.rent', $bike->id) }}">
                        @csrf

                        <div class="mb-3">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="mb-3">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>

                        <button class="bd-btn w-100">
                            Rent Now
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection