@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Bikes</h2>
    <a href="{{ route('admin.bikes.create') }}" class="btn btn-warning fw-bold">Add New Bike</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Price/Day</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bikes as $bike)
                        <tr>
                            <td>
                                @if($bike->image)
                                    <img src="{{ asset('images/' . $bike->image) }}" alt="Bike" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $bike->name }} <br><small class="text-muted">{{ $bike->brand }} {{ $bike->model }}</small></td>
                            <td>{{ $bike->city }}</td>
                            <td>₹{{ $bike->price_per_day }}</td>
                            <td>
                                @if($bike->status == 'Available')
                                    <span class="badge bg-success">Available</span>
                                @elseif($bike->status == 'Maintenance')
                                    <span class="badge bg-warning text-dark">Maintenance</span>
                                @else
                                    <span class="badge bg-secondary">Unavailable</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.bikes.edit', $bike->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('admin.bikes.destroy', $bike->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this bike?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No bikes found. Click "Add New Bike" to get started.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
