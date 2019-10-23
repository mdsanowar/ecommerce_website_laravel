<?php
Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Product by Category route are here======================
Route::get('category/{slug}/by_product', 'CategoryController@categoryByproduct')->name('categorybyproduct');
//Product by Manufacture route are here ==============================
Route::get('manufacture/{slug}/by_product', 'ManufactureController@manufactureByproduct')->name('manufacturebyproduct');

//Product details route are here===============
route::get('product_/{id}/details', 'ProductController@ViewProduct')->name('productDetails');

//Cart controller route are here===============
route::post('add-to-cart', 'CartController@add_to_cart')->name('add-to-cart');
route::get('/show-cart', 'CartController@show_cart');
route::get('delete-to-cart/{rowId}', 'CartController@delete_to_cart')->name('delete-to-cart');
route::post('update-cart/{rowId}', 'CartController@update_cart');

// Checkout Route are here=====================
route::get('/login-check', 'CheckoutController@login_check');
route::post('register_customer', 'CheckoutController@register_customer')->name('register_customer');
route::get('/check-out', 'CheckoutController@Checkout');
route::post('/save-shipping-details', 'CheckoutController@save_shipping_details');
// Customer login and logout route are here=====================
route::post('/customer_login', 'CheckoutController@customer_login');
route::get('/customer_logout', 'CheckoutController@customer_logout');

//Payment route are here======================================
route::get('/payment', 'CheckoutController@payment');
route::post('/order-place', 'CheckoutController@order_place');



/*===========================================
			ADMIN ROUTE ARE HERE
 ============================================*/


Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function() {

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// CATEGORY ROUTE ARE HERE===========================
Route::resource('category', 'CategoryController');
Route::get('category/{slug}/unactive', 'CategoryController@unactive_category')->name('category.unactive_category');
Route::get('category/{slug}/active', 'CategoryController@active_category')->name('category.active_category');

//MANUFACTURE ROUTE ARE HERE===========================
Route::resource('manufacture', 'ManufactureController');
Route::get('manufacture/{slug}/unactive', 'ManufactureController@unactive_manufacture')->name('manufacture.unactive_manufacture');
Route::get('manufacture/{slug}/active', 'ManufactureController@active_manufacture')->name('manufacture.active_manufacture');

//POST ROUTE ARE HERE ==============================
Route::resource('product', 'ProductsController');
Route::get('product/{slug}/unactive', 'ProductsController@unactive_product')->name('product.unactive_product');
Route::get('product/{slug}/active', 'ProductsController@active_product')->name('product.active_product');

//SLIDER ROUTE ARE HERE =============================
Route::resource('slider', 'SliderController');
Route::get('slider/{slug}/unactive', 'SliderController@unactive_slider')->name('slider.unactive_slider');
Route::get('slider/{slug}/active', 'SliderController@active_slider')->name('slider.active_slider');

//MANAGE ROUTE ARE HERE =============================
Route::resource('order', 'OrderController');
Route::get('order/{order_id}/unactive', 'OrderController@unactive_order')->name('order.unactive_order');
Route::get('order/{order_id}/active', 'OrderController@active_order')->name('order.active_order');

//SETTING ROUTE ARE HERE=================================
Route::get('profile-setting', 'SettingController@index')->name('profile-setting');
Route::put('update-profile', 'SettingController@update_profile')->name('update-profile');
Route::put('update-password', 'SettingController@update_password')->name('update-password');

});


//Author route are here=======================

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author', 'middleware'=>['auth','author']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});


