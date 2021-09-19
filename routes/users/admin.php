<?php

use Illuminate\Support\Facades\Route;
Route::get('/enterEmail','Admin\Auth\ForgetPasswordController@getEmail')->name('getEmail');
Route::post('/enterEmail','Admin\Auth\ForgetPasswordController@postEmail')->name('postEmail');
Route::get('/reset-password/{token}', 'Admin\Auth\resetpasswordController@getPassword');
Route::post('/reset-password', 'Admin\Auth\resetpasswordController@updatePassword');

Route::get('/adminLogin','Admin\Auth\AdminLoginController@login')->name('loginAdmin');
Route::post('/adminAuthenticate','Admin\Auth\AdminLoginController@authenticate')->name('authenticate');

Route::group(['middleware' => ['admin:admin'],'prefix'=>'admin'], function ()  {
    
    Route::get('/adminHome','Admin\AdminController@index')->name('adminhome');  
    Route::get('/adminLogout','Admin\Auth\AdminLoginController@logout')->name('adminlogout');
    Route::get('/updateProfile/{id}','Admin\AdminController@editProfile')->name('updateProfile');
    Route::post('/updateProfile/{id}','Admin\AdminController@saveUpdates')->name('saveUpdates');
    Route::get('/changePassword/{id}','Admin\AdminController@changePassword')->name('changePassword');
    Route::post('/updatePassword/{id}','Admin\AdminController@updatePassword')->name('updatePassword');
    Route::get('/allproducts','Admin\ProductsController@indexadmin')->name('allProducts');
    Route::get('/createProduct','Admin\ProductsController@createProduct')->name('createProduct');
    Route::post('/StoreProduct','Admin\ProductsController@storeProduct')->name('storeProduct');
    Route::get('/editProduct/{id}','Admin\ProductsController@editProduct')->name('product.edit');
    Route::post('/updateProduct/{id}','Admin\ProductsController@updateProduct')->name('product.update');
    Route::delete('/deleteProduct/{id}','Admin\ProductsController@deleteProduct')->name('product.delete');
    Route::get('/allCategories','Admin\CategoryController@index')->name('allcategories');
    Route::get('/createCategory','Admin\CategoryController@createCategory')->name('createCategory');
    Route::post('/createCategory','Admin\CategoryController@storeCategory')->name('storeCategory');
    Route::delete('/deletecategory/{id}','Admin\CategoryController@deleteCategory')->name('category.delete');


});