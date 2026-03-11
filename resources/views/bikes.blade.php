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

            <div class="row mt-4">

                <!-- Sidebar Filters -->
                <div class="col-lg-3 mb-4">
                    <div class="bike-search-box m-0" style="margin-top: 0 !important;">
                        <h4 class="mb-4" style="font-weight: 600;">Filter By</h4>
                        
                        <form method="GET" action="{{ route('bikes') }}">
                            <!-- Location -->
                            <div class="mb-4">
                                <label class="form-label text-muted" style="font-weight: 500;">Location</label>
                                <select name="city" class="form-select form-control">
                                    <option value="">Select City</option>
                                    <option value="Surat" {{ ($city == 'Surat') ? 'selected' : '' }}>Surat</option>
                                    <option value="Ahmedabad" {{ ($city == 'Ahmedabad') ? 'selected' : '' }}>Ahmedabad</option>
                                    <option value="Goa" {{ ($city == 'Goa') ? 'selected' : '' }}>Goa</option>
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class="mb-4">
                                <label class="form-label text-muted" style="font-weight: 500;">Price</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="number" name="min_price" class="form-control" placeholder="Min" value="{{ $min_price }}">
                                    <span class="text-muted">-</span>
                                    <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ $max_price }}">
                                </div>
                            </div>

                            <!-- Type -->
                            <div class="mb-4">
                                <label class="form-label text-muted" style="font-weight: 500;">Type</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="type[]" value="Bike" id="typeBike" {{ in_array('Bike', $types ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="typeBike">Bike</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="type[]" value="Scooty" id="typeScooty" {{ in_array('Scooty', $types ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="typeScooty">Scooty</label>
                                </div>
                            </div>
                            
                            <!-- Adding Sorting option -->
                            <h4 class="mb-3 mt-4" style="font-weight: 600;">Sort By</h4>
                            <div class="mb-4">
                                <select name="sort" class="form-select form-control">
                                    <option value="">Recommend</option>
                                    <option value="price_asc" {{ ($sort ?? '') == 'price_asc' ? 'selected' : '' }}>Price Low → High</option>
                                    <option value="price_desc" {{ ($sort ?? '') == 'price_desc' ? 'selected' : '' }}>Price High → Low</option>
                                    <option value="newest" {{ ($sort ?? '') == 'newest' ? 'selected' : '' }}>Newest</option>
                                    <option value="popular" {{ ($sort ?? '') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-yellow w-100 mt-2">Apply Filters</button>
                        </form>
                    </div>
                </div>

                <!-- Bike Cards -->
                <div class="col-lg-9">
                    <div class="row g-4">

                        @forelse($bikes as $bike)

                            <div class="col-lg-6 col-md-6">
                                <div class="bike-card">

                                    <div class="bike-image">
                                        <img src="{{ asset('images/' . $bike->image) }}" alt="">
                                    </div>

                                    <div class="bike-info">

                                        <h4>{{ $bike->name }}</h4>

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="price m-0">
                                                ₹{{ $bike->price_per_day }} <span style="font-size: 14px; font-weight: normal;">/ day</span>
                                            </div>
                                            <div>
                                                @if($bike->status == 'Available')
                                                    <span class="badge bg-success" style="padding: 6px 10px;">Available</span>
                                                @elseif($bike->status == 'Maintenance')
                                                    <span class="badge bg-warning text-dark" style="padding: 6px 10px;">Maintenance</span>
                                                @else
                                                    <span class="badge bg-secondary" style="padding: 6px 10px;">Unavailable</span>
                                                @endif
                                            </div>
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

                        @empty
                            <div class="col-12 text-center py-5" style="background: #fff; border-radius: 12px; border: 1px dashed #ddd;">
                                <div class="mb-3">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 50px; height: 50px; color: #ccc;">
                                        <g opacity="0.5">
                                            <circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <line x1="12" y1="8" x2="12" y2="12" stroke-linecap="round" stroke-linejoin="round"/>
                                            <line x1="12" y1="16" x2="12.01" y2="16" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                    </svg>
                                </div>
                                <h4 class="text-muted" style="font-weight: 600;">No bikes available for selected location and dates.</h4>
                                <p class="text-muted mt-2">Try another location or adjust your filters.</p>
                                <a href="{{ route('bikes') }}" class="btn btn-yellow mt-3 px-4 py-2" style="font-weight: 500;">Clear Filters</a>
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>

    </section>

@endsection