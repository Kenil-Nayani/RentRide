<nav class="custom-navbar fixed-top">
    <div class="container navbar-wrapper">

        <!-- Logo -->
        <a class="brand-logo" href="{{ route('home') }}">RentRide</a>

        <!-- CENTER: Links -->
        <ul class="nav-menu">
            <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li><a class="nav-link" href="{{ route('bikes') }}">Bikes</a></li>
            <li><a class="nav-link" href="#">About Us</a></li>
            <li><a class="nav-link" href="#">Contact Us</a></li>
            <li><a class="nav-link" href="">My Bookings</a></li>
        </ul>

        <!-- RIGHT SIDE -->
        <div style="display:flex;align-items:center;gap:15px;">

            <!-- Location -->
            <form method="POST" action="{{ route('select.city') }}">
                @csrf

                <select name="city" class="location-dropdown" onchange="this.form.submit()">
                    <option value="">Select City</option>
                    <option value="Surat">Surat</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Goa">Goa</option>
                </select>

            </form>

            @auth

                <div class="user-menu">

                    <div class="user-trigger">
                        <div class="user-icon">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <span class="user-name">
                            {{ Auth::user()->name }}
                        </span>
                    </div>

                    <div class="dropdown-menu-custom">

                        <!-- NEW -->
                        <a href="{{ route('profile') }}" class="dropdown-item">
                            My Profile
                        </a>

                        <!-- EXISTING -->
                        <a href="" class="dropdown-item">
                            My Bookings
                        </a>

                        <!-- LOGOUT -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item logout-btn">
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            @else

                <a href="{{ route('login') }}" class="btn btn-yellow">
                    Login / Sign Up
                </a>

            @endauth

        </div>

    </div>
</nav>