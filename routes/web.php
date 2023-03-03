<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@index');
Route::get('/cart', 'MainController@cart');
Route::get('/category/{slug}', 'MainController@category')->name('category.products');
Route::get('/favorite', 'MainController@favorite');
Route::get('/login', 'MainController@loginForm');
Route::get('/register', 'MainController@registerForm');
Route::get('/show/{slug}', 'MainController@show')->name('show');
Route::post('/login', 'MainController@login');
Route::post('/register', 'MainController@register');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/', 'AdminDashboard@index');
    Route::get('/products-photo/{id}', 'ProductController@photo')->name('products.photo');
    Route::post('/products-photo/{id}', 'ProductController@storePhoto')->name('products.photo');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/products', 'ProductController');
    Route::resource('/users', 'UserController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/materials', 'MaterialController');
    Route::resource('/material_category', 'MaterialCategoryController');
    Route::resource('/notices', 'NoticeController');
});