<?php

use App\Http\Controllers\ClientConteroller;
use App\Http\Controllers\DashboardConteroller;
use App\Http\Controllers\HomeConteroller;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Models\Client;
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
    Route::get('/home', [HomeConteroller::class, 'index'])->name('home');
    Route::post('/home', [HomeConteroller::class, 'search'])->name('home.search');
    Route::put('/home', [ClientConteroller::class, 'favori'])->name('restaurant.favori');
    Route::get('/restaurant/{restaurant}', [RestaurantController::class, 'show'])->name('restaurant.show');
});

Route::middleware('restaurateur')->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('horaires', HoraireController::class);
    Route::resource('photos', PhotoController::class);
    Route::get('/dashboard', [DashboardConteroller::class, 'index'])->name('restaurateur.dashboard');
});


require __DIR__ . '/auth.php';
