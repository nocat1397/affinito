<?php

use App\HomeBanner;
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

Route::domain(env('DOMAIN'))->group(function () {
    Route::get('/user', 'UserController@details');
    Route::get('{any}', function () {
        $banners = HomeBanner::all();
        return view('app',compact('banners'));
    })->where('any', '.*');
    Auth::routes();
    Route::post('/registerUser', 'UserController@user');
});
Route::domain(env('DOMAIN2'))->group(function () {
    Route::get('/user', 'UserController@details');
    Route::get('{any}', function () {
        $banners = HomeBanner::all();
        return view('app',compact('banners'));
    })->where('any', '.*');
    Auth::routes();
    Route::post('/registerUser', 'UserController@user');
});

Route::domain(env('SUB_DOMAIN'))->group(function () {

    Auth::routes();
    Route::group(['middleware'=>'authenticated'], function(){

        Route::get('/add_banner', 'ImageController@show');     //Home Banner Upload
        Route::post('/addImage', 'ImageController@store');     //Home Banner Upload
        Route::get('/deleteBanner/{id}', 'ImageController@bannerDelete');     //Home Banner Upload

        Route::get('add-category' ,'LinkController@addCategory');
        Route::post('addCategory', 'CategoryController@store');
        Route::get('/category', 'CategoryController@index');
        Route::get('add-subcategory' ,'LinkController@addSubCategory');
        Route::post('addSubCategory', 'SubCategoryController@store');
        Route::get('add-subsubcategory' ,'LinkController@addSubSubCategory');
        Route::get('show-category' ,'LinkController@ShowCategory');
        Route::get('/showSubCategory/{id}' ,'LinkController@ShowSubCategory');
        Route::get('/showSubSubCategory/{id}' ,'LinkController@ShowSubSubCategory');
        Route::post('/getsubcategory','SubSubCategoryController@getSubcategory');
        Route::post('/getsubsubcategory','SubSubCategoryController@getSubSubcategory');
        Route::post('addSubSubCategory', 'SubSubCategoryController@store');
        Route::post('CategoryUpdate', 'CategoryController@edit');
        Route::get('deleteCategory/{id}', 'CategoryController@destroy');
        Route::post('SubCategoryUpdate', 'SubCategoryController@edit');
        Route::get('deleteSubCategory/{id}', 'SubCategoryController@destroy');
        Route::post('SubSubCategoryUpdate', 'SubSubCategoryController@edit');
        Route::get('deleteSubSubCategory/{id}', 'SubSubCategoryController@destroy');

        // Route::get('/user', 'UserController@details');
        Route::get('add-product' ,'LinkController@addProduct');
        
        Route::post('/addProduct', 'ProductController@store');
        Route::get('/show-products', 'ProductController@index');
        Route::get('/show-enquiries', 'LinkController@enquiry');
        Route::post('/productUpdate', 'ProductController@productChange');
        Route::get('/deleteProduct/{id}', 'ProductController@destroy');
        Route::get('/delete-image/{product}/{image}', 'ImageController@destroy');
        Route::get('/show-newsletter', 'NewsletterController@index');
        Route::get('/delete-news/{id}', 'NewsletterController@destroy');
        Route::get('/pending-orders', 'OrderController@pending');
        Route::get('/accepted-orders', 'OrderController@accepted');
        Route::get('/dispatch-orders', 'OrderController@dispatched');
        Route::get('/delivered-orders', 'OrderController@delivered');
        Route::get('/declined-orders', 'OrderController@declined');
        Route::get('/cancel-orders', 'OrderController@cancelled');
        Route::get('/orderDetails/{id}', 'OrderController@orderDetails');
        Route::get('/updateStatus/{o_id}/{s_id}', 'OrderController@updateStatus');
        
        Route::get('/accept/{id}', 'OrderController@acceptOrder');
        Route::get('/decline/{id}', 'OrderController@declineOrder');
        Route::get('/cancelApprove/{id}', 'OrderController@cancelApprove');
        Route::get('/cancelDisapprove/{id}', 'OrderController@cancelDisapprove');
        Route::resource('product','ProductController');
        Route::resource('purchaser','PurchaserController');
        
        Route::get('/show-transactions', 'TransactionController@allTransactions');

        Route::get('logout', function(){
            Auth::logout();
            return redirect('/home');
        });
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('{any}', function () {
            return view('home');
        })->middleware('auth')->where('any', '.*');
        
        
    });    
});

