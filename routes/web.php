<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\Bike;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/select-city', [HomeController::class, 'selectCity'])->name('select.city');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/bikes', function (Request $request) {

    $city = $request->city;

    if ($city) {
        $bikes = Bike::where('city', $city)->get();
    } else {
        $bikes = Bike::all();
    }

    return view('bikes', compact('bikes', 'city'));
})->name('bikes');

Route::get('/bike/{id}', function ($id) {
    $bike = Bike::findOrFail($id);
    return view('bike-details', compact('bike'));
})->name('bike.details');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
Route::get("/about",function(){
    return view('about');
});
Route::get("/contact",function(){
    return view('contact');
});