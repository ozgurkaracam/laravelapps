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
Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix'=>'edmin','middleware'=>'auth'],
    function(){
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.index');
        Route::resource('categories','CategoryController');
        Route::resource('subcategories','SubcategoryController');
        Route::resource('products','ProductController');
        Route::get('/subcategories/create/{id?}','SubcategoryController@create')->name('subcategories.create.withcategory');
        Route::get('/subcategories/load/{id}','SubcategoryController@loadSubcategories')->name('loadSubcategories');
        Route::get('/orders','OrderController@index')->name('admin.orders');
        Route::get('/order/{id}','OrderController@show')->name('admin.order');
        Route::get('/users','UserController@index')->name('admin.users');
        Route::delete('/users/{id}','UserController@destroy')->name('admin.delete.user');
    });
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::get('/c/{slug}','HomeController@getProductsByCategory')->name('getproductsbycategory');
Route::get('/c/{slug}/sub/','HomeController@getProductsBySubcategory')->name('getproductsbysubcategory');
Route::get('/p/{id}','HomeController@getProduct')->name('getProduct');
Route::post('/addtocart','CartController@addToCart')->name('addtocart');
Route::post('/deletetocart','CartController@deleteToCart')->name('deletetocart');
Route::get('/cart','CartController@index')->name('cart');
Route::get('/order/{total}','CartController@order')->name('order')->middleware('auth');
Route::post('/charge','CartController@payment')->middleware('auth');
Route::get('/orders','CartController@orders')->name('orders')->middleware('auth');


