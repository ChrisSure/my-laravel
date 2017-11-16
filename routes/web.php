<?php

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

//-----------------------------------------------------Site

Route::get('/', 'SiteController@index')->name('site');



Route::get('/page/{slug}', 'PagesController@index')->name('pages');

Route::get('/category/{slug}', 'CategoryController@index')->name('category');

//-----------------------------------------------------Site



//-----------------------------------------------------Office

Route::group(['prefix'=>'office','middleware'=>'auth'], function() {
	
	Route::get('/', 'Office\OfficeController@index')->name('office');
		
});

//-----------------------------------------------------Office



//-----------------------------------------------------Admin

Route::group(['prefix'=>'admin','middleware'=>['auth', 'admin']], function() {
	
	Route::get('/', 'Admin\HomeController@index')->name('home');
	
	
	/////////////////////////////////////////////////////////////////////////////////////////////Blog
	
	//admin/pages
	Route::group(['prefix' => 'pages', 'middleware' => 'pages-perm'], function() {
		//admin/pages
		Route::match(['get','post'], '/all/{status?}/{name?}', ['uses'=>'Admin\Blog\PagesController@index','as'=>'pagesIndex']);
		//admin/view/$id
		Route::get('/view/{id}', ['uses'=>'Admin\Blog\PagesController@view', 'as'=>'pagesView']);
		//admin/pages/add
		Route::match(['get','post'], '/add', ['uses'=>'Admin\Blog\PagesController@add', 'as'=>'pagesAdd']);
		//admin/edit/id
		Route::match(['get','post'], '/edit/{pages}', ['uses'=>'Admin\Blog\PagesController@edit', 'as'=>'pagesEdit']);
		//admin/delete/id
		Route::get('/delete/{id}', ['uses'=>'Admin\Blog\PagesController@delete', 'as'=>'pagesDelete']);
		//admin/pages/sort/up
		Route::get('/up/{id}', ['uses'=>'Admin\Blog\PagesController@up', 'as'=>'pagesUp']);
		//admin/pages/sort/down
		Route::get('/down/{id}', ['uses'=>'Admin\Blog\PagesController@down', 'as'=>'pagesDown']);
	});
	
	
	//admin/category
	Route::group(['prefix' => 'category', 'middleware' => 'category-perm'], function() {
		//admin/category
		Route::match(['get','post'], '/all/{name?}',['uses'=>'Admin\Blog\CategoryController@index','as'=>'categoryIndex']);
		//admin/view/$id
		Route::get('/view/{id}', ['uses'=>'Admin\Blog\CategoryController@view','as'=>'categoryView']);
		//admin/category/add
		Route::match(['get','post'], '/add',['uses'=>'Admin\Blog\CategoryController@add','as'=>'categoryAdd']);
		//admin/edit/id
		Route::match(['get','post'], '/edit/{category}',['uses'=>'Admin\Blog\CategoryController@edit','as'=>'categoryEdit']);
		//admin/delete/id
		Route::get('/delete/{id}', ['uses'=>'Admin\Blog\CategoryController@delete','as'=>'categoryDelete']);
		//admin/category/sort/up
		Route::get('/up/{id}', ['uses'=>'Admin\Blog\CategoryController@up','as'=>'categoryUp']);
		//admin/category/sort/down
		Route::get('/down/{id}', ['uses'=>'Admin\Blog\CategoryController@down','as'=>'categoryDown']);
	});
	
	/////////////////////////////////////////////////////////////////////////////////////////////Blog
	
	
	/////////////////////////////////////////////////////////////////////////////////////////////Auth
	
	//admin/user
	Route::group(['prefix' => 'user', 'middleware' => 'user-perm'], function() {
		//admin/user
		Route::get('/all/{status?}/{role?}/{name?}',['uses'=>'Admin\Auth\UserController@index', 'as'=>'userIndex']);
		//Route::get('/role/{status?}/{role?}',['uses'=>'Admin\UserController@index', 'as'=>'userIndexParam']);
		//admin/user/view/$id
		Route::get('/view/{id}', ['uses'=>'Admin\Auth\UserController@view', 'as'=>'userView']);
		//admin/user/add
		Route::match(['get', 'post'], '/add', ['uses'=>'Admin\Auth\UserController@add', 'as'=>'userAdd']);
		//admin/user/edit/id
		Route::match(['get', 'post'], '/edit/{user}', ['uses'=>'Admin\Auth\UserController@edit', 'as'=>'userEdit']);
		//admin/user/password/id
		Route::match(['get','post'],'/password/{user}',['uses'=>'Admin\Auth\UserController@password','as'=>'userPassword']);
		//admin/user/delete/id
		Route::get('/delete/{id}', ['uses'=>'Admin\Auth\UserController@delete', 'as'=>'userDelete']);
	});
	
	
	//admin/perm
	Route::group(['prefix' => 'perm', 'middleware' => 'user-perm'], function() {
		//admin/perm
		Route::match(['get','post'], '/all/{status?}/{name?}', ['uses'=>'Admin\Auth\PermissionsController@index','as'=>'permIndex']);
		//admin/view/$id
		Route::get('/view/{id}', ['uses'=>'Admin\Auth\PermissionsController@view', 'as'=>'permView']);
		//admin/perm/add
		Route::match(['get','post'], '/add', ['uses'=>'Admin\Auth\PermissionsController@add', 'as'=>'permAdd']);
		//admin/edit/id
		Route::match(['get','post'], '/edit/{perm}', ['uses'=>'Admin\Auth\PermissionsController@edit', 'as'=>'permEdit']);
		//admin/delete/id
		Route::get('/delete/{id}', ['uses'=>'Admin\Auth\PermissionsController@delete', 'as'=>'permDelete']);
	});
	
	
	//admin/roles
	Route::group(['prefix' => 'roles', 'middleware' => 'user-perm'], function() {
		//admin/roles
		Route::match(['get','post'], '/all/{status?}/{name?}', ['uses'=>'Admin\Auth\RolesController@index','as'=>'rolesIndex']);
		//admin/view/$id
		Route::get('/view/{id}', ['uses'=>'Admin\Auth\RolesController@view', 'as'=>'rolesView']);
		//admin/roles/add
		Route::match(['get','post'], '/add', ['uses'=>'Admin\Auth\RolesController@add', 'as'=>'rolesAdd']);
		//admin/edit/id
		Route::match(['get','post'], '/edit/{roles}', ['uses'=>'Admin\Auth\RolesController@edit', 'as'=>'rolesEdit']);
		//admin/delete/id
		Route::get('/delete/{id}', ['uses'=>'Admin\Auth\RolesController@delete', 'as'=>'rolesDelete']);
	});
	
	/////////////////////////////////////////////////////////////////////////////////////////////Auth
	
	
	////////////////////////////////////////////////////////////////////////////////////////////System
	
	Route::get('/info', ['uses'=>'Admin\System\InfoController@view', 'as'=>'info'])->middleware('system-perm');
	
	Route::match(['get', 'post'], '/setting', ['uses'=>'Admin\System\SettingController@view', 'as'=>'setting'])->middleware('system-perm');
	
	Route::get('/log', ['uses'=>'Admin\System\LogController@view', 'as'=>'log'])->middleware('system-perm');
	Route::get('/log/clear', ['uses'=>'Admin\System\LogController@clear', 'as'=>'log-clear'])->middleware('system-perm');
	
	Route::get('/cache', ['uses'=>'Admin\System\CacheController@view', 'as'=>'cache']);
	Route::get('/cache/clear', ['uses'=>'Admin\System\CacheController@clear', 'as'=>'cache-clear']);
	
	//admin/security
	Route::group(['prefix' => 'security', 'middleware' => 'system-perm'], function() {
		//admin/security
		Route::get('/all/{status?}/{ip?}',['uses'=>'Admin\System\SecurityController@index', 'as'=>'securityIndex']);
		//admin/security/view/$id
		Route::get('/view/{id}', ['uses'=>'Admin\System\SecurityController@view', 'as'=>'securityView']);
		//admin/security/add
		Route::match(['get', 'post'], '/add', ['uses'=>'Admin\System\SecurityController@add', 'as'=>'securityAdd']);
		//admin/security/edit/id
		Route::match(['get', 'post'], '/edit/{security}', ['uses'=>'Admin\System\SecurityController@edit', 'as'=>'securityEdit']);
		//admin/security/password/id
		Route::match(['get','post'],'/password/{security}',['uses'=>'Admin\System\SecurityController@password','as'=>'securityPassword']);
		//admin/security/delete/id
		Route::get('/delete/{id}', ['uses'=>'Admin\System\SecurityController@delete', 'as'=>'securityDelete']);
	});
	
	////////////////////////////////////////////////////////////////////////////////////////////System
	
		
});

//-----------------------------------------------------Admin



//-----------------------------------------------------Auth

//Login Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware(['mercy', 'security']);
$this->post('login', 'Auth\LoginController@login')->middleware('security');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->get('confirm/{id?}/{token?}', 'Auth\RegisterController@confirm')->name('confirm');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

//-----------------------------------------------------Auth
