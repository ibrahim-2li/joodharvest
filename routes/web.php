<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;

// Locale switching route
Route::get('/locale/{locale}', [LocaleController::class, 'change'])->name('locale.change');

Route::get('/', function () {
    return view('welcome');
});
