<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\AdminController;

//Users

Route::get('/users', [UsersController::class, 'users']);
Route::post('/user', [UsersController::class, 'users_check'])->name('users_check');

//Category

Route::get('/category', [CategoryController::class, 'category']);
Route::get('/new-category', [CategoryController::class, 'new_category']);
Route::post('/check-category', [CategoryController::class, 'check_category'])->name('category_check');
Route::post('/delete-category', [CategoryController::class, 'category_delete'])->name('category_delete');
Route::get('/bulletin', [CategoryController::class, 'bulletin']);

//Bulletin

Route::get('/bulletin', [AdminController::class, 'bulletin']);
Route::post('/bulletin', [AdminController::class, 'bulletin_check'])->name('bulletin_check');
Route::post('/delete-bulletin', [AdminController::class, 'bulletin_delete'])->name('bulletin_delete');
