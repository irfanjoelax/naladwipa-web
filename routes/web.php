<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\WelcomeController::class);
Route::get('/about', App\Http\Controllers\AboutController::class);
Route::get('/program/{slug}', App\Http\Controllers\ProgramController::class);
Route::get('/essay', [App\Http\Controllers\EssayController::class, 'index']);
Route::get('/essay/{slug}', [App\Http\Controllers\EssayController::class, 'detail']);
Route::get('/film', [App\Http\Controllers\FilmController::class, 'index']);
Route::get('/film/{slug}', [App\Http\Controllers\FilmController::class, 'detail']);

Auth::routes([
    'register' => false,
    'reset'    => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
        Route::resource('/program', App\Http\Controllers\Admin\ProgramController::class)->except('show');
        Route::resource('/essay', App\Http\Controllers\Admin\EssayController::class)->except('show');
        Route::resource('/film', App\Http\Controllers\Admin\FilmController::class)->except('show');
        Route::resource('/banner', App\Http\Controllers\Admin\BannerController::class)->except('show');
        Route::resource('/information', App\Http\Controllers\Admin\InformationController::class)->only(['index']);
        Route::post('/information/about', [App\Http\Controllers\Admin\InformationController::class, 'about']);
        Route::post('/information/visi', [App\Http\Controllers\Admin\InformationController::class, 'visi']);
        Route::post('/information/misi', [App\Http\Controllers\Admin\InformationController::class, 'misi']);
        Route::post('/information/sosial_media', [App\Http\Controllers\Admin\InformationController::class, 'sosial_media']);
        Route::resource('/profile', App\Http\Controllers\Admin\ProfileController::class)->only(['index', 'store']);
    });
});
