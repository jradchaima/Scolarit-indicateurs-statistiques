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
Route::get('/sancaffich', 'SanctionController@index')->middleware('etablissement');

Route::post('/save', 'ViolenceController@store');
Route::get('/editviolence/{id}', 'ViolenceController@edit');
Route::put('/violenceupdate/{id}', 'ViolenceController@update');
Route::delete('/violencedelete/{id}', 'ViolenceController@delete');
Route::get('/violenceetabliss', 'ViolenceController@etabliss')->name('violenceetabliss')->middleware('etablissement');
Route::get('/violenceregion', 'ViolenceController@region')->name('violenceregion')->middleware('region');
Route::get('/violstat', 'ViolenceController@stat')->name('violstat')->middleware('region');
Route::get('/violaffich', 'ViolenceController@index')->middleware('etablissement');

Route::post('/save', 'ViolenceController@store');
Route::get('/editviolence/{id}', 'ViolenceController@edit');
Route::put('/violenceupdate/{id}', 'ViolenceController@update');
Route::delete('/violencedelete/{id}', 'ViolenceController@delete');

