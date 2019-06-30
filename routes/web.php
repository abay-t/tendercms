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

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('admin');
Route::post('register', 'Auth\RegisterController@register')->middleware('admin');


// App Routes...

Route::get('/home', 'HomeController@index')->name('home');

//Admin routes

Route::get('/admin', 'AdminController@admin')->name('admin')->middleware('admin');
Route::get('/admin/users', 'AdminController@admin')->name('users')->middleware('admin');
Route::get('/admin/tenders', 'AdminController@tenders')->name('tenders')->middleware('admin');
Route::get('/admin/portals', 'AdminController@portals')->name('portals')->middleware('admin');
Route::get('/admin/predmets', 'AdminController@predmets')->name('predmets')->middleware('admin');
Route::get('/admin/tips', 'AdminController@tips')->name('tips')->middleware('admin');


//User routes

Route::get('/user/{id}/edit', 'AdminController@edituser');
Route::post('user/{id}/update', 'AdminController@updateuser')->name('edituser');
Route::get('user/{id}/delete', 'AdminController@deleteuser')->name('deleteuser');

// Tender routes
Route::get('addtender', 'TenderController@create')->name('addtender');
Route::post('addtender', 'TenderController@store')->name('storetender');
Route::get('tender/{id}', 'TenderController@show')->name('showtender');
Route::get('tender/{id}/edit', 'TenderController@edit');
Route::post('tender/{id}/update', 'TenderController@update')->name('edittender');
Route::get('tender/{id}/delete', 'TenderController@destroy')->name('deletetender');

//Portals routes

Route::get('addportal', 'PortalController@create')->name('addportal');
Route::post('addportal', 'PortalController@store')->name('storeportal');
Route::get('portal/{id}/edit', 'PortalController@edit');
Route::post('portal/{id}/update', 'PortalController@update')->name('editportal');
Route::get('portal/{id}/delete', 'PortalController@destroy')->name('deleteportal');

//Predmets routes

Route::get('addpredmet', 'PredmetController@create')->name('addpredmet');
Route::post('addpredmet', 'PredmetController@store')->name('storepredmet');
Route::get('predmet/{id}/edit', 'PredmetController@edit');
Route::post('predmet/{id}/update', 'PredmetController@update')->name('editpredmet');
Route::get('predmet/{id}/delete', 'PredmetController@destroy')->name('deletepredmet');

//tips routes

Route::get('addtip', 'TipController@create')->name('addtip');
Route::post('addtip', 'TipController@store')->name('storetip');
Route::get('tip/{id}/edit', 'TipController@edit');
Route::post('tip/{id}/update', 'TipController@update')->name('edittip');
Route::get('tip/{id}/delete', 'TipController@destroy')->name('deletetip');

//contracts routes

Route::get('admin/contracts', 'AdminController@contracts');

//filter and sort routes

Route::post('search', 'AdminController@search')->name('search');
Route::get('admin/tenders/price', 'AdminController@price');
Route::get('admin/tenders/date', 'AdminController@date');
Route::get('admin/tenders/margin', 'AdminController@margin');