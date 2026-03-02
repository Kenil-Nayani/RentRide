@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<section class="auth-section">

    <div class="auth-box">

        <h2>Create Account</h2>

        {{-- Success --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-yellow w-100">
                Register
            </button>

            <p class="mt-3 text-center">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </p>

        </form>

    </div>

</section>

@endsection