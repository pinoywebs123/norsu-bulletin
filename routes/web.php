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

Route::get('/', [CategoryController::class, 'index']);

Route::get('/user', [CategoryController::class, 'users']);

Route::get('/category', [CategoryController::class, 'category']);
Route::get('/new-category', [CategoryController::class, 'new_category']);
Route::post('/check-category', [CategoryController::class, 'check_category']);


Route::get('/bulletin', [CategoryController::class, 'bulletin']);