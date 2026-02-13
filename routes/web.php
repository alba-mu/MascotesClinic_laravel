<?php

use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Owner routes
Route::name('owner.')->prefix('owners')->group(function () {
    Route::get('/list', function () {
        return view('owners.list');
    })->name('list');
    
    Route::get('/search', function () {
        return view('owners.search');
    })->name('search');
    
    Route::get('/modify', function () {
        return view('owners.modify');
    })->name('modify');
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
