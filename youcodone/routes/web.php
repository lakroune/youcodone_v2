<?php

use App\Http\Controllers\DashboardConteroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});
Route::middleware('client')->group(function () {
    Route::get('/home', [RestaurantController::class, 'index'])->name('home');
    Route::get('/home/{id}', [RestaurantController::class, 'show'])->name('home.show');

});

Route::middleware('restaurateur')->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::get('/dashboard', [DashboardConteroller::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
