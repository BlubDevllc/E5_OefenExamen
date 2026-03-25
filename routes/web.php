<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Moderator Routes
Route::middleware(['auth', 'verified'])->prefix('moderator')->group(function () {
    Route::get('/dashboard', [ModeratorController::class, 'dashboard'])->name('moderator.dashboard');
    Route::post('/users/{user}/approve', [ModeratorController::class, 'approveUser'])->name('moderator.approve');
    Route::post('/users/{user}/block', [ModeratorController::class, 'blockUser'])->name('moderator.block');
    Route::post('/users/{user}/unblock', [ModeratorController::class, 'unblockUser'])->name('moderator.unblock');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.edit-user');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.update-user');
    Route::post('/users/{user}/role/{role}', [AdminController::class, 'updateRole'])->name('admin.update-role');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');
});

require __DIR__.'/auth.php';
