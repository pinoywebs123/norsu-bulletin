<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
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


Route::get('/', [CategoryController::class, 'index']);

Route::get('/user', [CategoryController::class, 'users']);

Route::get('/category', [CategoryController::class, 'category']);
Route::get('/new-category', [CategoryController::class, 'new_category']);
Route::post('/check-category', [CategoryController::class, 'check_category'])->name('category_check');


Route::get('/bulletin', [CategoryController::class, 'bulletin']);


Route::get('/users', [AdminController::class, 'users']);

Route::get('/bulletin', [AdminController::class, 'bulletin']);
Route::post('/bulletin', [AdminController::class, 'bulletin_check'])->name('bulletin_check');
Route::post('/delete-bulletin', [AdminController::class, 'bulletin_delete'])->name('bulletin_delete');
