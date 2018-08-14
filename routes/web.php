<?php

Route::get('demo', function(){

	return view('email.user.register');
}
);

Route::group(['middleware' => 'locale'], function(){
	Route::get('change-language/{language}','HomeController@changeLanguage')->name('user.change-language');

	Route::group([],function(){
		Route::get('resetPassword', 'ResetPasswordController@resetPassword')->name('resetPassword');
	});

	Route::group(['namespace' => 'home', 'prefix' => '/'], function(){
		Route::get('/', 'HomeController@index')->name('home');
		Route::post('/', 'HomeController@index')->name('home');

		Route::group(['prefix' => 'ajax'], function(){
			Route::get('adress/{county_name}', 'AjaxController@adress')->name('county');
			Route::get('county/{pro_id}', 'AjaxController@county')->name('county');
		});

		Route::group(['prefix'  => 'product'], function(){
			Route::get('product_details/{id}', 'ProductController@views')->name('product_details');
			Route::post('product_details/{id}', 'ProductController@views')->name('product_details');
			Route::get('product_category/{category_id}', 'ProductController@product_category')->name('product_category');
			Route::get('product_brand/{category_id}', 'ProductController@product_brand')->name('product_brand');
			Route::post('product_price', 'ProductController@product_price')->name('product_price');
			Route::get('product_price', 'ProductController@product_price')->name('product_price');
			// Route::post('product_start', 'ProductController@product_start')->name('product_start');
			Route::get('product_start', 'ProductController@product_start')->name('product_start');
			Route::get('sap-xep-san-pham/{sort}', 'ProductController@sort')->name('sap-xep-san-pham');
			Route::get('total-list-image/{val}', 'ProductController@total_list_image')->name('total_list_image');
		});	

		Route::group(['prefix' => 'account'], function(){
			Route::get('register', 'HomeController@sign_up')->name('register');
			Route::get('login', 'HomeController@login')->name('login');
			Route::post('login', 'HomeController@sign')->name('login');
			Route::get('forget_password', 'HomeController@resetPassword')->name('forget_password');
			Route::get('reset-mat-khau', 'HomeController@verify')->name('verify');
			Route::post('reset-mat-khau', 'HomeController@updatePassword')->name('reset-mat-khau');
			Route::get('logout_user', 'HomeController@logout')->name('logout_user');
		});

		Route::group(['prefix' => 'reviews'], function(){
			Route::post('add-comment/{id}', 'ProductController@addComment')->name('add-comment')->middleware('auth');
			Route::get('add-comment/{id}', 'ProductController@addComment')->name('add-comment')->middleware('auth');
			Route::get('add-rate/{id}', 'ProductController@addRate')->name('add-rate')->middleware('auth');
		});
		
		Route::group(['prefix' => 'cart' ,  'middleware' => 'auth'], function(){
			Route::post('cart/{id}', 'HomeController@cart')->name('cart');
			Route::get('cart/{id}', 'HomeController@cart')->name('cart');
			Route::get('viewOrder', 'HomeController@viewOrder')->name('viewOrder');
			Route::get('deleteCart/{rowId}', 'HomeController@deleteCart')->name('deleteCart');
			Route::get('checkout', 'HomeController@checkout')->name('checkout');
			Route::post('checkout', 'HomeController@checkout')->name('checkout');
			Route::get('editQty/{rowId}', 'HomeController@editQty')->name('editQty');
			Route::get('viewOrders/{id}','OrderController@viewOrders')->name('viewOrders');
			Route::get('add_cart/{id}','OrderController@add_cart')->name('add_cart');
			Route::get('deleteAll','OrderController@deleteAll')->name('deleteAll');
			Route::post('checkoutOrder', 'OrderController@checkout')->name('checkoutOrder');
			Route::get('detail-{id}', 'OrderController@orderDetail')->name('orderDetailHome');
		});

		Route::group(['prefix' => 'sale'], function(){
			Route::get('/', 'SaleController@index')->name('sale');
		});
	});

	Route::get('admin/login', 'UserController@getLoginAdmin')->name('login-Admin');
	Route::post('admin/login', 'UserController@postLoginAdmin')->name('login-Admin');

	Route::get('admin/logout', 'UserController@logoutAdmin')->name('logout-Admin');

	Route::group([ 'namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'adminLogin'], function(){

		Route::get('/', 'DashboardController@index')->name('admin');
		
		Route::group(['prefix' => 'category'], function(){
			Route::get('/', 'CategoryController@index')->name('category');
			Route::get('add_category', 'CategoryController@add')->name('add_category');
			Route::post('add_category', 'CategoryController@create')->name('add_category');
			Route::get('update_category/{id}', 'CategoryController@edit')->name('update_category');
			Route::post('update_category/{id}', 'CategoryController@update')->name('update_category');
			Route::get('delete_category/{id}', 'CategoryController@delete')->name('delete_category');
			Route::get('delete-comment/{id}/{product_id}', 'CommentController@delete')->name('delete-comment');
		});
		

		Route::group(['prefix' => 'product'], function(){
			Route::get('/', 'ProductController@index')->name('product');
			Route::post('/', 'ProductController@indexSearch')->name('post-san-pham');
			Route::get('add_product', 'ProductController@add')->name('add_product');
			Route::post('add_product', 'ProductController@create')->name('add_product');
			Route::get('view_product/{id}', 'ProductController@views')->name('view_product');
			Route::get('update_product/{id}', 'ProductController@edit')->name('update_product');
			Route::post('update_product/{id}', 'ProductController@update')->name('update_product');
			Route::get('attributes', 'ProductController@att')->name('attributes');
			Route::post('attributes', 'ProductController@addAtt')->name('attributes');
			Route::get('exitAtt/{id}', 'ProductController@exitAtt')->name('exitAtt');
			Route::get('editAtt/{id}', 'ProductController@editAtt')->name('editAtt');
			Route::post('editAtt/{id}', 'ProductController@updateAtt')->name('editAtt');
			Route::get('proAtt/{id}', 'ProductController@proAtt')->name('proAtt');
			Route::post('proAtt/{id}', 'ProductController@createAtt')->name('proAtt');
			Route::get('deleteAtt/{prodcut_id}/{id}', 'ProductController@deleteAtt')->name('deleteAtt');
			Route::get('product_hot/{id}/{hot}', 'ProductController@product_hot')->name('product_hot');
			Route::post('list_image/{id}', 'ProductController@list_image')->name('list-image');
			Route::get('view_list_image/{id}','ProductController@view_list_images')->name('view-list-image');
			Route::get('delete_list_image/{id}','ProductController@delete_list_images')->name('delete-list-image');
		});
		

		Route::group(['prefix'=>'user'],function(){
			Route::get('/','CustomerController@index')->name('user');
			Route::get('delete-user/{id}', 'CustomerController@delete')->name('delete-user');
			Route::get('destroy/{id}', 'CustomerController@destroy')->name('destroy');
			Route::get('edit_account/{id}', 'CustomerController@edit')->name('edit_account');
			Route::post('edit_account/{id}', 'CustomerController@update')->name('edit_account');
		});

		
		Route::group(['prefix'=>'order'],function(){
			Route::get('/', 'OrdersController@index')->name('order');
			Route::post('/', 'OrdersController@indexSearch')->name('post-order');
			Route::get('detail/{id}', 'OrdersController@detail')->name('detail');		
			Route::get('selectPays/{id}', 'OrdersController@ajaxPays')->name('selectPays');
			Route::get('approved/{id}', 'OrdersController@approved')->name('approved');
		});

		Route::group(['prefix' => 'method'],function(){
			Route::get('pay', 'OrdersController@method')->name('pay');
			Route::post('pay', 'OrdersController@pay')->name('pay');
			Route::get('editPay/{id}', 'OrdersController@editPay')->name('editPay');
			Route::post('editPay/{id}', 'OrdersController@updatePay')->name('editPay');
			Route::get('editShip/{id}', 'OrdersController@editShip')->name('editShip');
			Route::post('editShip/{id}', 'OrdersController@updateShip')->name('editShip');
			Route::get('ship', 'OrdersController@ship')->name('ship');
			Route::post('ship', 'OrdersController@newShip')->name('ship');
			Route::get('deleteShip/{id}', 'OrdersController@deleteShip')->name('deleteShip');
			Route::get('deletePay/{id}', 'OrdersController@deletePay')->name('deletePay');
		});
		
		Route::group(['prefix' => '/'], function(){
			Route::get('/list_admin', 'AdminController@index')->name('list-admin');
			Route::get('update_admin/{id}', 'AdminController@edit')->name('update-admin');
			Route::post('update_admin/{id}', 'AdminController@update')->name('update-admin');
			Route::get('delete_admin/{id}', 'AdminController@delete')->name('delete-admin');
			Route::get('account_admin/{id}', 'AdminController@detail')->name('account-admin');
			Route::get('add_new_account', 'AdminController@add')->name('add_new_account');
			Route::post('add_new_account', 'AdminController@create')->name('add_new_account');
			Route::get('account-admin', 'AdminController@views')->name('account-admin');
			Route::post('update_account_admin/{id}', 'AdminController@updateViews')->name('update_account_admin');
			Route::get('logs', 'LogController@logs')->name('logs');
			Route::post('logs', 'LogController@search')->name('logs');
		});
		
		Route::group(['prefix' => 'slide'], function(){
			Route::get('/', 'SlideController@index')->name('list-slide');
			Route::get('add_slide', 'SlideController@add')->name('add-slide');
			Route::post('add_slide', 'SlideController@create')->name('add-slide');
			Route::get('delete_slide/{id}', 'SlideController@delete')->name('delete-slide');
			Route::get('edit_slide/{id}', 'SlideController@edit')->name('edit-slide');
			Route::post('edit_slide/{id}', 'SlideController@update')->name('edit-slide');
		});

		Route::group(['prefix' => 'sale'], function(){
			Route::get('/', 'SaleController@index')->name('list-sale');
			Route::get('add_sale', 'SaleController@add')->name('add-sale');
			Route::post('add_sale', 'SaleController@create')->name('add_sale');
			Route::get('edit_sale/{id}', 'SaleController@edit')->name('edit-sale');
			Route::post('edit_sale/{id}', 'SaleController@update')->name('edit-sale');
			Route::get('change/{id}', 'SaleController@change')->name('change-sale');
		});

		Route::group(['prefix' => 'discount_code'], function(){
			Route::get('/', 'CodeController@index')->name('list-code');
			Route::post('/', 'CodeController@index')->name('list-code');
			Route::get('add-code', 'CodeController@add')->name('add-code');
			Route::post('add-code', 'CodeController@create')->name('add-code');
			Route::get('edit', 'CodeController@edit')->name('edit-code');
			Route::post('edit', 'CodeController@update')->name('edit-code');
			Route::get('change/{id}', 'CodeController@change')->name('change-code');
		});

	});

	Auth::routes();

	Route::get('/',  'HomeController@index')->name('home');
});



