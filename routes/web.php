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

/*home page of user*/

Route::get('/home', 'HomeController@index')->name('home');

/*logout*/

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*dashboard of admin*/

Route::get('/dashboard', 'HomeController@AdminIndex')->name('Dashboard');

/*Show the list of all users*/

Route::get('/addAwards','usersController@showUsers');

/*Show the add awards page*/

Route::get('/addAwards/{id}','awardsController@addAwards');

/*add the new awards to database*/

Route::post('/addNewAwards/{id}','awardsController@addNewawards');

/*delete the unwanted awards*/

Route::get('/deleteAward/{id}','awardsController@deleteAward');

/*show the update page with existing details*/

Route::get('/updateAwardsInfo/{id}','awardsController@updateAwardsInfo');

/*update the awards if needed*/

Route::post('/updateAward/{id}','awardsController@updateAward');

/*search any Awards stored */

Route::post('/searchAwards','awardsController@searchAwards');