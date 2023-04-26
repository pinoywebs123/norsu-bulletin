<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', function() {
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-check', [AuthController::class, 'login_check'])->name('login_check');

Route::get('/category', [CategoryController::class, 'category']);
Route::get('/new-category', [CategoryController::class, 'new_category']);
Route::post('/check-category', [CategoryController::class, 'check_category'])->name('category_check');
Route::post('/delete-category', [CategoryController::class, 'category_delete'])->name('category_delete');


Route::get('/bulletin', [CategoryController::class, 'bulletin'])->name('bulletin');


Route::get('/users', [AdminController::class, 'users']);

Route::get('/bulletin', [AdminController::class, 'bulletin']);
Route::post('/bulletin', [AdminController::class, 'bulletin_check'])->name('bulletin_check');
Route::post('/delete-bulletin', [AdminController::class, 'bulletin_delete'])->name('bulletin_delete');
