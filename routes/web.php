<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blogs
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.list');
    Route::get('/blogs/add', [BlogController::class, 'create'])->name('blogs.add');
    Route::post('/blogs/add', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
});

require __DIR__ . '/auth.php';
