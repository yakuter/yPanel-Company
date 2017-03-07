<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Route::group(['middleware' => 'web'], function () {
	
	Auth::routes();

	Route::get('/admin/logout', function () {	    
	    Auth::logout();
    	Session::flush();
    	Cache::flush();
        return Redirect::to('/login');
	});

	Route::get('/admin', 'HomeController@index');

	Route::resource('/admin/categories', 'Admin\CategoryController');
	Route::resource('/admin/products', 'Admin\ProductController');
	Route::resource('/admin/photos', 'Admin\PhotoController');
	Route::resource('/admin/pages', 'Admin\PageController');
	Route::resource('/admin/headlines', 'Admin\HeadlineController');
	Route::resource('/admin/news', 'Admin\NewsController');
	Route::resource('/admin/users', 'Admin\UserController');
	Route::resource('/admin/settings', 'Admin\SettingController');
	Route::resource('/admin/posts', 'Admin\PostController');

});

Route::get('/', 'Frontend\HomeController@index');
Route::get('/hakkimizda', 'Frontend\HomeController@about');