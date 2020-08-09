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
Route::get('/',function(){
    return view('welcome');
});
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
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/c/{slug}','HomeController@getProductsByCategory')->name('getproductsbycategory');
Route::get('/p/{id}','HomeController@getProduct')->name('getProduct');
