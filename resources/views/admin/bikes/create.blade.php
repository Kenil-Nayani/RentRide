@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Add New Bike</h2>
    <a href="{{ route('admin.bikes.index') }}" class="btn btn-outline-secondary">Back to List</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.bikes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label fw-bold">Bike Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g. Royal Enfield Classic 350">
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <label class="form-label fw-bold">City <span class="text-danger">*</span></label>
                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" required placeholder="e.g. Surat">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Price Per Day (₹) <span class="text-danger">*</span></label>
                    <input type="number" name="price_per_day" class="form-control" value="{{ old('price_per_day') }}" required min="0" placeholder="e.g. 800">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 mb-3 mb-md-0">
                    <label class="form-label fw-bold">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" placeholder="e.g. Royal Enfield">
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <label class="form-label fw-bold">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ old('model') }}" placeholder="e.g. Classic 350">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Availability Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Unavailable" {{ old('status') == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                        <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                </div>
            </div>

            <h5 class="mt-4 mb-3 border-bottom pb-2 text-muted">Specifications</h5>
            
            <div class="row mb-3">
                <div class="col-md-3 mb-3 mb-md-0">
                    <label class="form-label fw-bold">Engine CC</label>
                    <input type="text" name="engine" class="form-control" value="{{ old('engine') }}" placeholder="e.g. 350cc">
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <label class="form-label fw-bold">Gear/Transmission</label>
                    <select name="gear" class="form-select">
                        <option value="">Select Type</option>
                        <option value="Manual" {{ old('gear') == 'Manual' ? 'selected' : '' }}>Manual (Bike)</option>
                        <option value="Automatic" {{ old('gear') == 'Automatic' ? 'selected' : '' }}>Automatic (Scooty)</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <label class="form-label fw-bold">Mileage</label>
                    <input type="text" name="mileage" class="form-control" value="{{ old('mileage') }}" placeholder="e.g. 40 kmpl">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Fuel Type</label>
                    <select name="fuel_type" class="form-select">
                        <option value="Petrol" {{ old('fuel_type') == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                        <option value="Electric" {{ old('fuel_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Bike Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Recommended aspect ratio: 4:3</small>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-warning fw-bold px-4">Save Bike</button>
            </div>

        </form>
    </div>
</div>
@endsection
