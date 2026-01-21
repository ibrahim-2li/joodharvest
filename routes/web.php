<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Locale switching route
Route::get('/locale/{locale}', [LocaleController::class, 'change'])->name('locale.change');

// Landing page
Route::get('/', [LandingController::class, 'index'])->name('home');


// Contact Form
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Admin Dashboard
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/update', [DashboardController::class, 'update'])->name('update');
    Route::post('/account/update', [DashboardController::class, 'updateAccount'])->name('account.update');
    
    // Contact messages management
    Route::post('/messages/{id}/read', [App\Http\Controllers\ContactController::class, 'markAsRead'])->name('messages.read');
    Route::delete('/messages/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('messages.delete');
});

// Default dashboard redirects to admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
