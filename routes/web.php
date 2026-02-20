<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;

// Pàgina d'inici (Pública)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutes d'Autenticació (Públiques)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutes Protegides (Només usuaris loguejats)
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
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
});
