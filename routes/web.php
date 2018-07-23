<?php


Route::get('demo',function(){
	

});

Route::group(['namespace' => 'home', 'prefix' => 'home'], function(){
	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/', 'HomeController@index')->name('home');

	Route::group(['prefix' => 'ajax'], function(){
		Route::get('adress/{county_name}', 'AjaxController@adress')->name('county');
		Route::get('county/{pro_id}', 'AjaxController@county')->name('county');
	});

	Route::group(['prefix'  => 'san-pham'], function(){
		Route::get('chi-tiet-san-pham/{id}', 'ProductController@views')->name('home-chi-tiet-san-pham');
		Route::post('chi-tiet-san-pham/{id}', 'ProductController@views')->name('home-chi-tiet-san-pham');
		Route::get('san-pham-danh-muc/{category_id}', 'ProductController@product_category')->name('san-pham-danh-muc');
		Route::get('san-pham-thuong-hieu/{category_id}', 'ProductController@product_brand')->name('san-pham-thuong-hieu');
		Route::post('san-pham-theo-gia', 'ProductController@product_price')->name('san-pham-theo-gia');
		// Route::post('san-pham-theo-rate', 'ProductController@product_start')->name('san-pham-theo-rate');
		Route::get('san-pham-theo-rate', 'ProductController@product_start')->name('san-pham-theo-rate');
		Route::get('sap-xep-san-pham/{sort}', 'ProductController@sort')->name('sap-xep-san-pham');
	});	

	Route::group(['prefix' => 'tai-khoan'], function(){
		Route::get('dang-ky', 'HomeController@sign_up')->name('dang-ky');
		Route::get('dang-nhap', 'HomeController@login')->name('dang-nhap');
		Route::get('dang-xuat-user', 'HomeController@logout')->name('dang-xuat-user');
	});

	Route::group(['prefix' => 'reviews'], function(){
		Route::post('add-comment/{id}', 'ProductController@addComment')->name('add-comment')->middleware('auth');
		Route::get('add-rate/{id}', 'ProductController@addRate')->name('add-rate')->middleware('auth');
		Route::get('add-rate/{id}', 'ProductController@addRate')->name('add-rate')->middleware('auth');
	});
	
	Route::group(['prefix' => 'gio-hang' ,  'middleware' => 'auth'], function(){
		Route::post('them-gio-hang/{id}', 'HomeController@cart')->name('them-gio-hang');
		Route::get('them-gio-hang/{id}', 'HomeController@cart')->name('them-gio-hang');
		Route::get('xem-don-hang', 'HomeController@viewOrder')->name('xem-don-hang');
		Route::get('xoa-san-pham-gio-hang/{rowId}', 'HomeController@deleteCart')->name('xoa-san-pham-gio-hang');
		Route::get('thanh-toan', 'HomeController@checkout')->name('thanh-toan');
		Route::post('thanh-toan', 'HomeController@checkout')->name('thanh-toan');
		Route::get('sua-qty-cart/{rowId}', 'HomeController@editQty')->name('sua-qty-cart');
		Route::get('lich-su-mua-hang/{id}','OrderController@viewOrders')->name('home-lich-su-mua-hang');
		Route::get('home-them-gio-hang/{id}','OrderController@add_cart')->name('home-them-gio-hang');
		Route::get('xoa-gio-hang','OrderController@deleteAll')->name('xoa-gio-hang');
		Route::post('thanh-toan-don-hang', 'OrderController@checkout')->name('thanh-toan-don-hang');

	});
});




Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin')->name('dang-nhap-Admin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin')->name('dang-nhap-Admin');
Route::get('admin/logout', 'UserController@getDangXuatAdmin')->name('dang-xuat-Admin');


Route::group([ 'namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'adminLogin'], function(){

	Route::get('/', 'DashboardController@index')->name('admin');

	
	Route::group(['prefix' => 'danh-muc'], function(){
		Route::get('/', 'CategoryController@index')->name('danh-muc');
		// Route::get('them-danh-muc', 'CategoryController@add')->name('them-danh-muc');
		Route::post('them-danh-muc', 'CategoryController@create')->name('them-danh-muc');
		Route::get('sua-danh-muc/{id}', 'CategoryController@edit')->name('sua-danh-muc');
		Route::post('sua-danh-muc/{id}', 'CategoryController@update')->name('sua-danh-muc');
		Route::get('xoa-danh-muc/{id}', 'CategoryController@delete')->name('xoa-danh-muc');
		Route::get('xoa-comment/{id}/{product_id}', 'CommentController@delete')->name('xoa-comment');
	});
	

	Route::group(['prefix' => 'san-pham'], function(){
		Route::get('/', 'ProductController@index')->name('san-pham');
		Route::post('/', 'ProductController@indexSearch')->name('post-san-pham');
		Route::get('them-san-pham', 'ProductController@add')->name('them-san-pham');
		Route::post('them-san-pham', 'ProductController@create')->name('them-san-pham');
		Route::get('xem-san-pham/{id}', 'ProductController@views')->name('xem-san-pham');
		Route::get('sua-san-pham/{id}', 'ProductController@edit')->name('sua-san-pham');
		Route::post('sua-san-pham/{id}', 'ProductController@update')->name('sua-san-pham');
		Route::get('thong-so-ky-thuat', 'ProductController@att')->name('thong-so-ky-thuat');
		Route::post('thong-so-ky-thuat', 'ProductController@addAtt')->name('thong-so-ky-thuat');
		Route::get('xoa-thuoc-tinh/{id}', 'ProductController@exitAtt')->name('xoa-thuoc-tinh');
		Route::get('sua-thuoc-tinh/{id}', 'ProductController@editAtt')->name('sua-thuoc-tinh');
		Route::post('sua-thuoc-tinh/{id}', 'ProductController@updateAtt')->name('sua-thuoc-tinh');
		Route::get('xem-thong-so-ky-thuat/{id}', 'ProductController@proAtt')->name('xem-thong-so-ky-thuat');
		Route::post('xem-thong-so-ky-thuat/{id}', 'ProductController@createAtt')->name('xem-thong-so-ky-thuat');
		Route::get('xoa-thong-so-ky-thuat/{prodcut_id}/{id}', 'ProductController@deleteAtt')->name('xoa-thong-so-ky-thuat');
		Route::get('san-pham-hot/{id}/{hot}', 'ProductController@product_hot')->name('san-pham-hot');
	});
	

	Route::group(['prefix'=>'khach-hang'],function(){
		Route::get('/','CustomerController@index')->name('khach-hang');
		Route::get('xoa-khach-hang/{id}', 'CustomerController@delete')->name('xoa-khach-hang');
		Route::get('lich-su-mua-hang/{id}', 'CustomerController@destroy')->name('lich-su-mua-hang');
		Route::get('sua-ho-so/{id}', 'CustomerController@edit')->name('sua-ho-so');
		Route::post('sua-ho-so/{id}', 'CustomerController@update')->name('sua-ho-so');
	});

	
	Route::group(['prefix'=>'don-hang'],function(){
		Route::get('/', 'OrdersController@index')->name('don-hang');
		Route::post('/', 'OrdersController@indexSearch')->name('post-don-hang');
		Route::get('chi-tiet-don-hang/{id}', 'OrdersController@detail')->name('chi-tiet-don-hang');		
		Route::get('selectPays/{id}', 'OrdersController@ajaxPays')->name('selectPays');
		Route::get('duyet-don-hang/{id}', 'OrdersController@duyet')->name('duyet-don-hang');
	});

	Route::group(['prefix' => 'phuong-thuc'],function(){
		Route::get('phuong-thuc-thanh-toan', 'OrdersController@method')->name('phuong-thuc-thanh-toan');
		Route::post('phuong-thuc-thanh-toan', 'OrdersController@pay')->name('phuong-thuc-thanh-toan');
		Route::get('sua-phuong-thuc-thanh-toan/{id}', 'OrdersController@editPay')->name('sua-phuong-thuc-thanh-toan');
		Route::post('sua-phuong-thuc-thanh-toan/{id}', 'OrdersController@updatePay')->name('sua-phuong-thuc-thanh-toan');
		Route::get('sua-phuong-thuc-giao-hang/{id}', 'OrdersController@editShip')->name('sua-phuong-thuc-giao-hang');
		Route::post('sua-phuong-thuc-giao-hang/{id}', 'OrdersController@updateShip')->name('sua-phuong-thuc-giao-hang');
		Route::get('phuong-thuc-giao-hang', 'OrdersController@ship')->name('phuong-thuc-giao-hang');
		Route::post('phuong-thuc-giao-hang', 'OrdersController@newShip')->name('phuong-thuc-giao-hang');
		Route::get('xoa-phuong-thuc-giao-hang/{id}', 'OrdersController@deleteShip')->name('xoa-phuong-thuc-giao-hang');
		Route::get('xoa-phuong-thuc-thanh-toan/{id}', 'OrdersController@deletePay')->name('xoa-phuong-thuc-thanh-toan');
	});
	
	Route::group(['prefix' => '/'], function(){
		Route::get('/danh-sach-admin', 'AdminController@index')->name('danh-sach-admin');
		Route::get('sua-thong-tin-admin/{id}', 'AdminController@edit')->name('sua-thong-tin-admin');
		Route::post('sua-thong-tin-admin/{id}', 'AdminController@update')->name('sua-thong-tin-admin');
		Route::get('xoa-quyen-admin/{id}', 'AdminController@delete')->name('xoa-quyen-admin');
		Route::get('ho-so-admin/{id}', 'AdminController@detail')->name('ho-so-admin');
		Route::get('them-moi-admin', 'AdminController@add')->name('them-moi-admin');
		Route::post('them-moi-admin', 'AdminController@create')->name('them-moi-admin');
		Route::get('ho-so-admin', 'AdminController@views')->name('ho-so-admin');
		Route::post('sua-ho-so-admin/{id}', 'AdminController@updateViews')->name('sua-ho-so-admin');
		Route::get('lich-su-hoat-dong', 'LogController@logs')->name('lich-su-hoat-dong');
		Route::post('lich-su-hoat-dong', 'LogController@search')->name('lich-su-hoat-dong');
	});
	
	Route::group(['prefix' => 'slide'], function(){
		Route::get('/', 'SlideController@index')->name('danh-sach-slide');
		Route::get('them-moi-slide', 'SlideController@add')->name('them-moi-slide');
		Route::post('them-moi-slide', 'SlideController@create')->name('them-moi-slide');
		Route::get('xoa-slide/{id}', 'SlideController@delete')->name('xoa-slide');
		Route::get('sua-slide/{id}', 'SlideController@edit')->name('sua-slide');
		Route::post('sua-slide/{id}', 'SlideController@update')->name('sua-slide');
	});

});

Auth::routes();

Route::get('/home',  'HomeController@index')->name('home');
