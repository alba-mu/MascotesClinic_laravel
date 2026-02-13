<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Owner routes
Route::name('owner.')->prefix('owners')->group(function () {
    Route::get('/list', [OwnerController::class, 'index'])->name('list');
    Route::get('/search', [OwnerController::class, 'showSearchForm'])->name('search');
    Route::get('/modify', [OwnerController::class, 'showModifyForm'])->name('modify');
});

// Pet routes
Route::name('pet.')->prefix('pets')->group(function () {
    Route::get('/list', function () {
        return view('pets.list');
    })->name('list');
    
    Route::get('/search', function () {
        return view('pets.search');
    })->name('search');
    
    Route::get('/history', function () {
        return view('pets.history');
    })->name('history');
});
