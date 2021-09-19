<?php
use Illuminate\Support\Facades\Route;


Route::get('/','User\UserController@index')->name('Shopper');
Route::get('/login','User\UserLogin@UserLogin')->name('login');
Route::post('/login','User\UserLogin@authenticate')->name('authenticateUser');
Route::get('register','User\UserLogin@register')->name('register');
Route::post('/store','User\UserLogin@storeUser')->name('storeUser');
Route::get('/products/{categoryId}','User\UserController@products')->name('products');
Route::middleware(['auth:web'])->group(function ()  {
  Route::post('/addtocart/{productId}','User\UserController@addToCart')->name('addToCart');
  Route::delete('/removefromcart/{productId}','User\UserController@removeFromCart')->name('removeFromCart');
  Route::get('/cart','User\UserController@cart')->name('cart');
  Route::post('/increaseQuantity/{productId}','User\UserController@increaseQuantity')->name('increaseQuantity');
  Route::post('/decreaseQuantity/{productId}','User\UserController@decreaseQuantity')->name('decreaseQuantity');
  Route::get('/logout','User\UserLogin@UserLogout')->name('logout');
  Route::post('/wishlist/{productId}','User\UserController@addToWishlist')->name('addToWishlist');
  Route::get('/wishlist','User\UserController@wishlist')->name('wishlist');
  Route::delete('/removeFromWishlist/{productId}','User\UserController@removeFromWishlist')->name('removeFromWishlist');
  Route::post('checkout','User\UserController@checkout')->name('checkout');
  Route::post('storeOrder','User\UserController@storeOrder')->name('storeOrder');

});