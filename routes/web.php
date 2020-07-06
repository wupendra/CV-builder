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

Auth::routes();

Route::prefix('admins')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

//Admin Routes Start.........................................................
Route::group(array('prefix' => 'admins','namespace' => 'backend','middleware'=>'auth:admin'), function(){
	//dashboard
	Route::get('/', 'AdminController@adminDashboard')->name('admin.dashboard');
	//admin CRUD
	Route::resource('admin', 'AdminController');
	Route::resource('sitesetting', 'SitesettingController');
	Route::get('admin-profile','AdminController@viewProfile')->name('backend.view.profile');
    Route::get('admin-edit-profile','AdminController@editProfile')->name('backend.edit.profile');
    Route::post('admin-edit-profile','AdminController@postEditProfile')->name('backend.edit.profile');
});
//Admin Route End...............................................................

Route::get('/', 'HomeController@index')->name('home');



//......Social Login Start..................
Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');
//......Social Login Start..................