<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', 'ProductController@front');
Route::get('/searchProducts/{name}', 'ProductController@searchProduct');
Route::get('/images', 'ImageController@cart');
Route::get('/product-details/{name}', 'ProductController@fetchProducts');
Route::get('/cart/{id}', 'CartController@cartDetails');
Route::get('/wishlist/{id}', 'WishlistController@wishlistDetails');
Route::get('/orders/{id}', 'OrderController@orders');
Route::post('/updateCart', 'CartController@update');
Route::post('/removeCartProduct', 'CartController@destroy');
Route::post('/addCart', 'CartController@store');
Route::post('/addWishlist', 'WishlistController@store');
Route::post('/removeWishlist', 'WishlistController@destroy');
Route::post('/payment', 'PurchaserController@store');
Route::post('/makeOrder', 'PurchaserController@makeOrder');
Route::post('/addNewsletter', 'NewsletterController@store');
Route::post('/orderCancel', 'OrderController@orderCancel');
Route::post('/addEnquiry', 'LinkController@addEnquiry');
Route::get('/show-wallet/{id}', 'WalletController@index');
Route::post('/addWallet', 'WalletController@store');
Route::post('/makePayment', 'WalletController@payment');
Route::get('/showTransactions/{id}', 'TransactionController@index');
// Route::get('/tags' ,'LinkController@allTags');