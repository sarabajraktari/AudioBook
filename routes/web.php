<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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


Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth'])->group(function () {
//     Route::resource('/book', bookController::class);
// });
Route::resource('/book', bookController::class);

Route::resource('/user', userController::class);

Auth::routes();


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Search for books
Route::get('/search', [bookController::class, 'search']);

//Search for users
Route::get('/searchUser', [userController::class, 'search1']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
