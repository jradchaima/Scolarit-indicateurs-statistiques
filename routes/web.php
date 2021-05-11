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
    return view('layouts/app');
});



Auth::routes();
Route::get('/home', 'AppController@home')->name('home')->middleware('auth');
Route::get('/welcome', function (){
    return view('welcome');
})->middleware('admin');
Route::get('/indicateurs', function (){
    return view('indicateurs');
})->middleware('admin');
Route::get('/region', function (){
    return view('region');
})->middleware('region');
Route::get('/etablissement', function (){
    return view('etablissement');
})->middleware('etablissement');
Auth::routes();
Route::resource('/user', 'UserController')->middleware('admin');
Route::get('/etablissuser', 'UserController@etabliss')->name('etablissuser')->middleware('admin');
Route::get('/regionuser', 'UserController@region')->name('regionuser')->middleware('admin');
Route::get('/centraluser', 'UserController@central')->name('centraluser')->middleware('admin');
Route::get('/createetabliss', 'UserController@create')->name('createetabliss')->middleware('admin');
Route::get('/sanctionetabliss', 'SanctionController@etabliss')->name('sanctionetabliss')->middleware('etablissement');
Route::get('/sanctionregion', 'SanctionController@region')->name('sanctionregion')->middleware('region');
Route::get('/sancstat', 'SanctionController@stat')->name('sancstat')->middleware('region');




