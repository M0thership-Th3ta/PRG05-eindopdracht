<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VTuberController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Report;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('home');
Route::get('/contact', [IndexController::class, 'contact'])
    ->name('contact');
Route::get('about-us/{id?}', [IndexController::class, 'aboutUs'])
    ->name('about-us');

Route::get('/dashboard', function () {
    $reports = Report::with('user')->latest()->get();
    return view('dashboard', compact('reports'));
})->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('vtubers/{vtuber}/edit', [VTuberController::class, 'edit'])
        ->name('vtubers.edit');
    Route::put('vtubers/{vtuber}', [VTuberController::class, 'update'])
        ->name('vtubers.update');
    Route::delete('vtubers/{vtuber}', [VTuberController::class, 'destroy'])
        ->name('vtubers.destroy');
    Route::get('vtubers/create', [VTuberController::class, 'create'])
        ->name('vtubers.create');
    Route::post('vtubers', [VTuberController::class, 'store'])
        ->name('vtubers.store');

    Route::get('vtubers', [VTuberController::class, 'index'])
        ->name('vtubers.index')
        ->withoutMiddleware(['auth', 'admin']);
    Route::get('vtubers/{vtuber}', [VTuberController::class, 'show'])
        ->name('vtubers.show')
        ->withoutMiddleware(['auth', 'admin']);
});

Route::post('vtubers/{vtuber}/toggle-active', [VTuberController::class, 'toggleActive'])
    ->name('vtubers.toggle-active')
    ->middleware(['auth', 'admin']);

Route::get('comments/{comment}', [CommentController::class, 'show'])
    ->name('comments.show');

Route::middleware(['auth'])->group(function () {
    Route::get('comments/create', [CommentController::class, 'create'])
        ->name('comments.create');
    Route::post('vtubers/{vtuber}/comments', [CommentController::class, 'store'])
        ->name('comments.store');
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])
        ->name('comments.edit');
    Route::put('comments/{comment}', [CommentController::class, 'update'])
        ->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('reports/{report}', [ReportController::class, 'destroy'])
        ->name('reports.destroy');
    Route::get('reports/{report}', [ReportController::class, 'show'])
        ->name('reports.show');

    Route::get('reports/create', [ReportController::class, 'create'])
        ->name('reports.create')
        ->withoutMiddleware(['admin']);
    Route::post('reports', [ReportController::class, 'store'])
        ->name('reports.store')
        ->withoutMiddleware(['admin']);
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])
        ->name('profile.index');
    Route::get('profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::get('profile/{user}', [ProfileController::class, 'show'])
        ->name('profile.show');
    Route::patch('profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
