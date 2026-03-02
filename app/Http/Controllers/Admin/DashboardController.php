<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bike;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBikes = Bike::count();
        $totalBookings = 0;
        $totalRevenue = 0;

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalBikes',
            'totalBookings',
            'totalRevenue'
        ));
    }
}