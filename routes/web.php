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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/dashboard', 'HomeController@AdminIndex')->name('Dashboard');

Route::get('/addAwards','usersController@showUsers');

Route::get('/addAwards/{id}','awardsController@addAwards');

Route::post('/addNewAwards/{id}','awardsController@addNewawards');

/*delete the unwanted awards*/

Route::get('/deleteAward/{id}','awardsController@deleteAward');

Route::get('/updateAwardsInfo/{id}','awardsController@updateAwardsInfo');

/*update the awards if needed*/

Route::post('/updateAward/{id}','awardsController@updateAward');

/*search any Awards stored */

Route::post('/searchAwards','awardsController@searchAwards');