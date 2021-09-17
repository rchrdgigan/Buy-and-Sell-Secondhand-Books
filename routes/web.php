<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view-book-item', function () {
    return view('view-book-item');
})->name('view.book.item');

Route::get('/add-cart', function () {
    return view('add-cart');
})->name('add.cart');

Route::get('/my-purchase', function () {
    return view('my-purchase-pending');
})->name('my.purchase');

Route::get('/my-purchase-inprocess', function () {
    return view('my-purchase-inprocess');
})->name('my.purchase.process');

Route::get('/my-purchase-completed', function () {
    return view('my-purchase-completed');
})->name('my.purchase.completed');

Route::get('/my-shop', function () {
    return view('my-shop');
})->name('my.shop');

Route::get('/filter-categories', function () {
    return view('filter-categories');
})->name('filter.categories');

Route::get('/filter-shop', function () {
    return view('filter-shop');
})->name('filter.shop');

Route::get('/view-shop', function () {
    return view('seller-shop');
})->name('seller.shop');

Route::get('/checkout', function () {
    return view('billing');
})->name('billing');