<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;



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
Route::get('/', [WelcomeController::class, 'index']);

// Route::middleware(['auth'])->group(function () {
//     Route::resource('/book', bookController::class);
// });
Route::resource('/admin/books', bookController::class);
Route::get('/books', [UserBookController::class, 'index']);


Route::resource('/user', userController::class);

Auth::routes();


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
