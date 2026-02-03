<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('/restaurateur-area', function () {
        return view('restaurateur.area');
    })->name('restaurateur.area');
});

require __DIR__ . '/auth.php';
