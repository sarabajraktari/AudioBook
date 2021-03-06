<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\mybooksController;

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
Route::get('/about', [AboutController::class, 'index']);

// Route::middleware(['auth'])->group(function () {
//     Route::resource('/book', bookController::class);
// });
Route::resource('/admin/books', bookController::class);
Route::get('/admin/books/{id}/chapter', [bookController::class, 'bookChapter']);
Route::post('/admin/books/{id}/chapter', [bookController::class, 'AddbookChapter']);

Route::post('/update_wishlist', [bookController::class, 'updateWishlist']);
Route::post('/remove-from-wishlist', [UserBookController::class, 'removeWishlist']);
Route::post('/add_book_list', [UserBookController::class, 'addBookList']);


Route::get('/books', [UserBookController::class, 'index']);
Route::get('/mybooks', [UserBookController::class, 'mybooks']);
Route::get('/mybooks/{id}', [UserBookController::class, 'showBook']);



Route::resource('/user', userController::class);

Auth::routes();


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
