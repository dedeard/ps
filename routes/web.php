<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/', [HomeController::class, 'store'])->name('home.store');
    Route::get('/create', [HomeController::class, 'create'])->name('home.create');
    Route::get('/{id}-detail', [HomeController::class, 'show'])->name('home.show');
    Route::get('/{id}-verify', [HomeController::class, 'verify'])->name('home.verify');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('doctors', DoctorController::class)->except('show');
});
