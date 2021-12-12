<?php
use App\Models\Shop;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\{
    UserController,
    HomeController,
    BookController,
    ShopController,
    MainController,
    PurchaseController,
    AccountManagementController,
};

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
        Route::get('main', [AccountManagementController::class, 'main'])->name('admin.main');
        Route::get('users', [AccountManagementController::class, 'showUsers'])->name('admin.users');
        Route::get('/srch/user', [AccountManagementController::class, 'searchUser'])->name('search.user');
        Route::get('/users/status/{user_id}/{status_code}', [AccountManagementController::class, 'updateStatus'])->name('update.status');
        Route::delete('/users/delete/{id}',[AccountManagementController::class, 'destroy'])->name('destroy.user');

        Route::get('users/reported',[AccountManagementController::class, 'listReported'])->name('admin.reported');
        Route::get('/users/block/{user_id}/{status_code}', [AccountManagementController::class, 'blockStatus'])->name('block.status');
        Route::get('users/blocked',[AccountManagementController::class, 'listBlocked'])->name('admin.blocked');
        Route::get('/users/unblock/{user_id}/{status_code}', [AccountManagementController::class, 'unblockStatus'])->name('unblock.status');
        Route::get('users/history',[AccountManagementController::class, 'listHistory'])->name('admin.history');
        Route::delete('/users/history/{id}',[AccountManagementController::class, 'delReport'])->name('reported.del');
        Route::get('users/reported/{id}',[AccountManagementController::class, 'userReported'])->name('view.reported');
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
        //add to cart and remove
        Route::get('/add-cart/{id}', [ShopController::class, 'cartShopping'])->name('add.cart');
        Route::get('/cart', [ShopController::class, 'diplayShopping'])->name('cart');
        Route::delete('/delete-cart', [ShopController::class, 'delShopping'])->name('del.cart');
        //chechout
        Route::post('/checkout/{id}', [MainController::class, 'checkoutBooks'])->name('billing');
        //chechout cart
        Route::post('/cart/checkout', [ShopController::class, 'checkoutCart'])->name('cart.buy');
        //buy book
        Route::post('/buy/book', [ShopController::class, 'addTransaction'])->name('buy.book');
        Route::get('/transaction/succeeded', function () {
            //Initializing caterogry and shop
            $category = Category::with('assign_book_category')->get();
            $shop = Shop::with('shop_book')->get();
            return view('order-succeeded',compact('category','shop'));
        })->name('book.transaction');
        Route::get('/transaction/not/allowed', function () {
            //Initializing caterogry and shop
            $category = Category::with('assign_book_category')->get();
            $shop = Shop::with('shop_book')->get();
            return view('order-not-allow',compact('category','shop'));
        })->name('book.not.allowed');
        //Show list of transaction
        Route::put('/my-purchase/canceled', [PurchaseController::class, 'cancelBook'])->name('cancel.purchase');
        Route::get('/my-purchase', [PurchaseController::class, 'displayPending'])->name('my.purchase');
        Route::get('/my-purchase/cancel/list', [PurchaseController::class, 'displayCanceled'])->name('my.purchase.canceled');
        Route::get('/my-purchase-inprocess', [PurchaseController::class, 'displayInprocess'])->name('my.purchase.process');
        Route::get('/my-purchase-completed', [PurchaseController::class, 'displayFinish'])->name('my.purchase.completed');

        //Show Customer
        Route::get('/myshop/customer', [ShopController::class, 'showCustomer'])->name('view.customer.list');
        Route::put('/myshop/transaction/approved', [ShopController::class, 'inprocessBook'])->name('transaction.processing');
        Route::put('/myshop/transaction/finish', [ShopController::class, 'finishTransaction'])->name('transaction.finish');
        Route::get('/myshop/transaction/history', [ShopController::class, 'displayInprocess'])->name('display.processing');

        //Report USer
        Route::post('/report/user/{user_id}',[AccountManagementController::class, 'reportedBy'])->name('report.user');
    });
});
Route::get('/view-book-item/{id}', [MainController::class, 'buyBooks'])->name('view.book.item');
Route::get('/filter-categories', [MainController::class, 'allBooks'])->name('filter.categories');
Route::get('/filter-categories/{name}', [MainController::class, 'bookCategory'])->name('filter.categories.name');
Route::get('/filter-shop/{name}', [MainController::class, 'shopCategory'])->name('filter.shop.name');
Route::get('/filter-shop-book/{name}/{parm1}/{parm2}', [MainController::class, 'shopBookCategory'])->name('filter.shop.book');
Route::get('/sorting-categories/{name}', [MainController::class, 'bookSort'])->name('sorting.book');
Route::post('/search', [MainController::class, 'searchShopCat'])->name('search.shop.cat');
Route::get('/shop/not/found', function () {
    //Initializing caterogry and shop
    $category = Category::with('assign_book_category')->get();
    $shop = Shop::with('shop_book')->get();
    return view('shop-not-found',compact('category','shop'));
})->name('shop.not.found');
Route::get('/contact', function () {
    //Initializing caterogry and shop
    $category = Category::with('assign_book_category')->get();
    $shop = Shop::with('shop_book')->get();
    return view('contact-us',compact('category','shop'));
})->name('contact');