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

Route::get('/','HomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Room redirect only
Route::get('/rooms', 'RoomController@index_room')->name('rooms');

Route::get('/aboutus', 'AboutusController@index_aboutus')->name('aboutus');


// Contact controler
Route::get('/contact', 'ContactController@index_contact')->name('contact');



// Reservation redirect only
Route::get('/reservation', 'ReservationController@index_reservation')->name('reservation');

// Find Rooms
Route::get('/rooms', 'FindRoomsController@index')->name('rooms');
Route::post('/rooms', 'FindRoomsController@index');
    




Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('country','CountryController');
    Route::resource('category','CategoryController');
    Route::resource('room','RoomController');
    Route::resource('booking','BookingController');
    Route::resource('contact','ContactController');
    Route::resource('photo','PhotoController');
    Route::resource('item','ItemController');
    Route::resource('welcome','WelcomeController');
    Route::resource('leadership','LeadershipController');
    Route::resource('history','HistoryController');
    
    
    
});
