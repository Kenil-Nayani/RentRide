@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<section class="auth-section">

    <div class="auth-box">

        <h2>Login</h2>

        {{-- Success --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation --}}
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-yellow w-100">
                Login
            </button>

            <p class="mt-3 text-center">
                Don’t have an account?
                <a href="{{ route('register') }}">Register</a>
            </p>

        </form>

    </div>

</section>

@endsection