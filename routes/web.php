<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
        Route::resource('/program', App\Http\Controllers\Admin\ProgramController::class)->except('show');
        Route::resource('/essay', App\Http\Controllers\Admin\EssayController::class)->except('show');
        Route::resource('/film', App\Http\Controllers\Admin\FilmController::class)->except('show');
        Route::resource('/information', App\Http\Controllers\Admin\InformationController::class)->only(['index']);
        Route::post('/information/about', [App\Http\Controllers\Admin\InformationController::class, 'about']);
        Route::post('/information/visi', [App\Http\Controllers\Admin\InformationController::class, 'visi']);
        Route::post('/information/misi', [App\Http\Controllers\Admin\InformationController::class, 'misi']);
        Route::post('/information/sosial_media', [App\Http\Controllers\Admin\InformationController::class, 'sosial_media']);
        Route::resource('/profile', App\Http\Controllers\Admin\ProfileController::class)->only(['index', 'store']);
    });
});
