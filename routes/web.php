<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Owner routes
Route::name('owner.')->prefix('owners')->group(function () {
    Route::get('/list', [OwnerController::class, 'index'])->name('list');
    Route::get('/search', [OwnerController::class, 'showSearchForm'])->name('search');
    Route::post('/search', [OwnerController::class, 'searchPets'])->name('searchPets');
    Route::get('/modify', [OwnerController::class, 'showModifyForm'])->name('modify');
    Route::post('/modify/search', [OwnerController::class, 'searchForModify'])->name('searchModify');
    Route::post('/modify/update', [OwnerController::class, 'update'])->name('update');
});

// Pet routes
Route::name('pet.')->prefix('pets')->group(function () {
    Route::get('/list', [PetController::class, 'index'])->name('list');
    Route::get('/list/{id}/edit', [PetController::class, 'edit'])->name('edit');
    Route::post('/list/update', [PetController::class, 'updateFromList'])->name('updateFromList');
    
    Route::get('/search', [PetController::class, 'showSearchForm'])->name('search');
    Route::post('/search', [PetController::class, 'searchDetail'])->name('searchDetail');
    
    Route::get('/history', [PetController::class, 'showAddHistoryForm'])->name('history');
    Route::post('/history', [PetController::class, 'storeHistory'])->name('storeHistory');
});
