<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\{UserController,HomeController,BookController,ShopController,MainController};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Display Book In Main Page
Route::get('/', [MainController::class, 'mainPageBooks'])->name('welcome');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);

Route::group(['middleware' => 'auth:admin'], function () {
    Route::prefix('admin')->group(function(){
        //admin
        Route::get('main', function () {
            return view('admin.main');
        })->name('admin.main');

        Route::get('users', function () {
            return view('admin.user-management');
        })->name('admin.users');

        Route::get('user/profile', function () {
            return view('admin.user-profile');
        })->name('user.profile');

        Route::get('users/reported', function () {
            return view('admin.reported');
        })->name('admin.reported');

        Route::get('users/blocked', function () {
            return view('admin.blocked');
        })->name('admin.blocked');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('user')->group(function(){
        //User Buyer and Seller
        Route::put('/udpate/profile', [UserController::class, 'updateUser'])->name('home.update.profile');
        Route::post('/add/book', [BookController::class, 'create'])->name('add.book');
        Route::delete('/del/book', [BookController::class, 'destroy'])->name('del.book');
        Route::get('/sell/book/list', [BookController::class, 'index'])->name('sell.book');
        //Shop
        Route::get('/my-shop', [ShopController::class, 'index'])->name('my.shop');
        Route::post('/shop/info', [ShopController::class, 'shopInfo'])->name('shop.info');

        Route::get('/add-cart/{id}', [ShopController::class, 'cartShopping'])->name('add.cart');
        Route::get('/cart', [ShopController::class, 'diplayShopping'])->name('cart');
        Route::delete('/delete-cart', [ShopController::class, 'delShopping'])->name('del.cart');

    });
});

Route::get('/myshop/customer', function () {
    return view('my-customer-list');
})->name('view.customer.list');

Route::get('/test', function () {
    return view('add-book');
});

Route::get('/view-book-item/{id}', [MainController::class, 'buyBooks'])->name('view.book.item');



Route::get('/my-purchase', function () {
    return view('my-purchase-pending');
})->name('my.purchase');

Route::get('/my-purchase-inprocess', function () {
    return view('my-purchase-inprocess');
})->name('my.purchase.process');

Route::get('/my-purchase-completed', function () {
    return view('my-purchase-completed');
})->name('my.purchase.completed');


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