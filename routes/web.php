<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

//Users

// Route::get('/users', [UsersController::class, 'users']);
// Route::post('/user', [UsersController::class, 'users_check'])->name('users_check');

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-check', [AuthController::class, 'login_check'])->name('login_check');

// Route::get('/category', [CategoryController::class, 'category']);
// Route::get('/new-category', [CategoryController::class, 'new_category']);
// Route::post('/check-category', [CategoryController::class, 'check_category'])->name('category_check');
// Route::post('/delete-category', [CategoryController::class, 'category_delete'])->name('category_delete');

// //Bulletin
// Route::get('/bulletin', [CategoryController::class, 'bulletin'])->name('bulletin');


// Route::get('/users', [AdminController::class, 'users']);

// Route::post('/bulletin', [AdminController::class, 'bulletin_check'])->name('bulletin_check');
// Route::post('/delete-bulletin', [AdminController::class, 'bulletin_delete'])->name('bulletin_delete');

Route::get('/news', [Controller::class, 'news'])->name('news');
Route::get('/news/{id}', [Controller::class, 'show_news'])->name('show_news');

Route::group(['middleware'=> 'auth'], function(){


    Route::get('/users', [UsersController::class, 'users']);
    Route::post('/user', [UsersController::class, 'users_check'])->name('users_check');
    Route::post('/delete-user', [UsersController::class, 'users_delete'])->name('users_delete');

    Route::get('/category', [CategoryController::class, 'category']);
    Route::get('/new-category', [CategoryController::class, 'new_category']);
    Route::post('/check-category', [CategoryController::class, 'check_category'])->name('category_check');
    Route::post('/delete-category', [CategoryController::class, 'category_delete'])->name('category_delete');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('/find-category', [CategoryController::class, 'find_category'])->name('find_category');
    Route::post('/update-category', [CategoryController::class, 'update_category'])->name('update_category');

    

    Route::get('/bulletin', [AdminController::class, 'bulletin'])->name('bulletin');
    Route::post('/bulletin', [AdminController::class, 'bulletin_check'])->name('bulletin_check');
    Route::post('/find-bulletin', [AdminController::class, 'find_bulletin'])->name('find_bulletin');
    Route::post('/update-bulletin', [AdminController::class, 'update_bulletin'])->name('update_bulletin');
    Route::post('/delete-bulletin', [AdminController::class, 'bulletin_delete'])->name('bulletin_delete');

});

