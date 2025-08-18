<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin'       => Route::has('login'),
//         'canRegister'    => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion'     => PHP_VERSION,
//     ]);
// });
Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profiles/{user}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/discover', [\App\Http\Controllers\DiscoverController::class, 'index'])->name('discover');
    Route::post('/users/{user}/follow', [\App\Http\Controllers\ConnectionController::class, 'store'])->name('users.follow');
    Route::delete('/users/{user}/unfollow', [\App\Http\Controllers\ConnectionController::class, 'destroy'])->name('users.unfollow');

});
