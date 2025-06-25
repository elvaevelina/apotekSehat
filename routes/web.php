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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'NavController@login')->name('login');
    Route::post('/ceklogin', 'NavController@ceklogin');
    Route::get('/searchobat', 'NavController@searchobat');
    Route::get('/actsearchobat', 'NavController@actsearchobat');

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home','NavController@home');
    Route::get('/obat','NavController@obat')->middleware('auth');
    Route::get('/obat/addObat','NavController@addObat');
    Route::post('/save','NavController@saveObat');
    Route::get('/obat/editObat/{id}','NavController@editObat');
    Route::put('updateObat/{id}','NavController@updateObat');
    Route::get('delete/{id}','NavController@deleteObat');
    Route::get('/logout', 'NavController@logout');
    Route::get('/edituser', 'NavController@edituser');
    Route::post('/updateuser', 'NavController@updateuser');
});
