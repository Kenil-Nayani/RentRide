<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - RentRide</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Your Local Bootstrap -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>

<div class="admin-layout">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="logo">
            <a href="{{ route('home') }}" style="color: inherit; text-decoration: none;">RentRide</a>
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.bikes.index') }}" class="{{ request()->routeIs('admin.bikes.*') ? 'active' : '' }}">Manage Bikes</a>
            </li>

            <li>
                <a href="#">Bookings</a>
            </li>

            <li>
                <a href="#">Users</a>
            </li>

            <li>
                <a href="#">Reports</a>
            </li>

            <li class="mt-4">
                <a href="{{ route('logout') }}">Logout</a>
            </li>

        </ul>

    </aside>


    <!-- Main -->
    <main class="main-content">

        <!-- Topbar -->
        <div class="topbar">

            <h4>Dashboard</h4>

            <div class="admin-user">
                Admin
            </div>

        </div>


        <!-- Page Content -->
        <div class="content-area">

            @yield('content')

        </div>

    </main>

</div>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>