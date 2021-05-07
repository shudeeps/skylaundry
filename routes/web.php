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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/driverprofile','ProfileController@driverprofile')->name('driverprofile');
Route::get('/cleanerprofile','ProfileController@cleanerprofile')->name('cleanerprofile');
Route::get('/customerprofile','ProfileController@customerprofile')->name('customerprofile');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::post('/driver/driverChangeStatus', 'OrderController@driverChangeStatus')->name('driver.driverChangeStatus');

Route::post('/cleaner/cleanerChangeStatus', 'OrderController@cleanerChangeStatus')->name('cleaner.cleanerChangeStatus');

Route::get('/driver/myAddedlist', 'OrderController@driverAddedlist')->name('driver.myAddedlist');
Route::get('/driver/myReturnlist', 'OrderController@driverReturnlist')->name('driver.myReturnlist');
Route::get('/customer/payOrderClick/{orderId}', 'OrderController@payOrderClick')->name('customer.payOrderClick');


Route::post('/customer/makeOrder', 'OrderController@makeorder')->name('customer.makeOrder');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('registerrole', 'AdminController@registerrole')->name('admin.registerrole');
  Route::post('storerole', 'AdminController@storerole')->name('admin.storerole');

  Route::get('cleanerdetails', 'AdminController@cleanerdetails')->name('admin.cleanerdetails');
  Route::get('cleaneredit/{id}', 'AdminController@cleaneredit')->name('admin.cleaneredit');
  Route::post('cleanereditinsert/{id}', 'AdminController@cleanereditinsert')->name('admin.cleanereditinsert');
  Route::get('cleanerdelete/{id}', 'AdminController@cleanerdelete')->name('admin.cleanerdelete');

  Route::get('driverdetails', 'AdminController@driverdetails')->name('admin.driverdetails');
  Route::get('driveredit/{id}', 'AdminController@driveredit')->name('admin.driveredit');
  Route::post('drivereditinsert/{id}', 'AdminController@drivereditinsert')->name('admin.drivereditinsert');
  Route::get('driverdelete/{id}', 'AdminController@driverdelete')->name('admin.driverdelete');
  
  


  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});