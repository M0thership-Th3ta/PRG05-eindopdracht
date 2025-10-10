<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VTuberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('vtubers', VTuberController::class);


Route::get('/about-us', function() {
    $company = 'Hogeschool Rotterdam';
    return view('about-us', [
        'company' => $company
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
