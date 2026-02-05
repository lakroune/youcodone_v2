<?php

use App\Http\Controllers\AdminDashboardConteroller;
use App\Http\Controllers\ClientConteroller;
use App\Http\Controllers\DashboardConteroller;
use App\Http\Controllers\HomeConteroller;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->prefix('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});
Route::middleware('client')->prefix('client')->group(function () {
    Route::get('/home', [HomeConteroller::class, 'index'])->name('home');
    Route::post('/home', [HomeConteroller::class, 'search'])->name('home.search');
    Route::put('/home/favori', [ClientConteroller::class, 'favori'])->name('restaurant.favori');
    Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('client.restaurant.show');
});
Route::middleware(['restaurateur'])->prefix('restaurateur')->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('horaires', HoraireController::class);
    Route::resource('photos', PhotoController::class);
    Route::get('/dashboard', [DashboardConteroller::class, 'index'])->name('restaurateur.dashboard');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/restaurants', [AdminDashboardConteroller::class, 'index'])->name('admin.restaurants');
    Route::get('/gestion', [AdminDashboardConteroller::class, 'gestion'])->name('admin.gestion');
    Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('admin.restaurant.show');
    Route::delete('/restaurants/{restaurant}', [AdminDashboardConteroller::class, 'destroy'])->name('admin.restaurant.destroy');
    Route::patch('/users/{user}', [AdminDashboardConteroller::class, 'updateRole'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminDashboardConteroller::class, 'destroyUser'])->name('admin.users.destroy');
});
require __DIR__ . '/auth.php';
