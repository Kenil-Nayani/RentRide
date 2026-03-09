<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/select-city', [HomeController::class, 'selectCity'])
    ->name('select.city');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/bikes', [BikeController::class, 'index'])
    ->name('bikes');

Route::get('/bike/{id}', [BikeController::class, 'show'])
    ->name('bike.details');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [UserController::class, 'profile'])
        ->name('profile');

    Route::get('/profile/edit', [UserController::class, 'editProfile'])
        ->name('profile.edit');

    Route::post('/profile/update', [UserController::class, 'updateProfile'])
        ->name('profile.update');

});

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

});

Route::view('/about', 'about')->name('about');

Route::view('/contact', 'contact')->name('contact');