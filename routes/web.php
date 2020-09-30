<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
    Alert::info('Info Title', 'Info Message');
    return view('welcome');
});

Route::get('/cust', function () {
    return view('customer.viewmenu');
});

Route::get('/checkout', function () {
    return view('customer.checkout');
});


//authentication and staff
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/orders', 'OrderController@index');
// Route::get('/orders', 'OrderController@test');
Route::get('/order/{id}', 'OrderController@show');
Route::any('/searchOrder', 'OrderController@userSearch');
Route::get('/custDetails', 'OrderController@custIndex');

//testing
Route::get('/hi', 'HomeController@hi')->name('home');



//for adding outlets
Route::get('/outlets', 'OutletController@index');
Route::get('/outlets/create', 'OutletController@create');
Route::post('/outlets/store', 'OutletController@store')->name('addOutlet');
Route::get('/outlets/{id}', 'OutletController@show');
Route::get('/outlets/{id}/edit', 'OutletController@edit');
Route::post('/outlets/{id}', 'OutletController@update')->name('editOutlet');
Route::get('/outlets/{id}/delete', 'OutletController@destroy')->name('deleteOutlet');
    //for search query in outlets
Route::any('/search', 'OutletController@userSearch');


//Route for tea series
Route::get('/teas', 'TeaSerController@index');
Route::resource('teaser', "TeaSerController");
Route::resource('teacat', "TeaCatController");
Route::post('/teaser/store', 'TeaSerController@store')->name('addTeaSer');
Route::post('/teacat/store', 'TeaCatController@store')->name('addTeaCat');
Route::post('/teaser/{id}/update', 'TeaSerController@update')->name('editTeaSer');
Route::post('/teacat/{id}/update', 'TeaCatController@update')->name('editTeaCat');
Route::get('/teacat/{id}/delete', 'TeaCatController@destroy')->name('deleteTeaCat');
Route::get('/teaser/{id}/delete', 'TeaSerController@destroy')->name('deleteTeaSer');
Route::get('teasss', 'TeaSerController@sss');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pdf', 'OrderController@pdfpdf');
