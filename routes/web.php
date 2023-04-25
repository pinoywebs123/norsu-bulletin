<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/users', [AdminController::class, 'users']);

Route::get('/category', [AdminController::class, 'category']);

Route::get('/bulletin', [AdminController::class, 'bulletin']);
Route::post('/bulletin', [AdminController::class, 'bulletin_check'])->name('bulletin_check');