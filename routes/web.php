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
Route::get('/lesrapports', function (){
    return view('lesrapports');
})->middleware('etablissement');
Route::get('/lesstatistiques', function (){
    return view('lesstatistiques');
})->middleware('region');
Route::get('/lesstatistiques2', function (){
    return view('lesstatistiques2');
});
Route::get('/lesrapports1', function (){
    return view('lesrapports1');
})->middleware('region');
Route::get('/lesrapports2', function (){
    return view('lesrapports2');
});
Auth::routes();
Route::resource('/user', 'UserController')->middleware('admin');
Route::get('/etablissuser', 'UserController@etabliss')->name('etablissuser')->middleware('admin');

Route::get('/centraluser', 'UserController@indexcentral')->name('centrauser')->middleware('admin');

Route::get('/sanctionetabliss', 'SanctionController@etabliss')->middleware('etablissement');

Route::get('/violenceetabliss', 'Violencecontroller@etabliss')->middleware('etablissement');
Route::get('/sanctionregion', 'SanctionController@region')->name('sanctionregion')->middleware('region');
Route::get('/violenceregion', 'ViolenceController@region')->name('violenceregion')->middleware('region');
Route::get('/sancstat', 'SanctionController@stat')->name('sancstat')->middleware('region');
Route::get('/violence', 'ViolenceController@index');
Route::get('/sanction', 'SanctionController@index');
Route::post('/savesanc', 'SanctionController@store');
Route::get('/editsanction/{id}', 'SanctionController@edit');
Route::delete('/sanctiondelete/{id}', 'SanctionController@delete');
Route::put('/sanctionupdate/{id}', 'SanctionController@update');
Route::post('/save', 'ViolenceController@store');
Route::get('/editviolence/{id}', 'ViolenceController@edit');
Route::put('/violenceupdate/{id}', 'ViolenceController@update');
Route::delete('/violencedelete/{id}', 'ViolenceController@delete');
//region
Route::get('/layouts/regionuser', 'UserController@indexregion')->name('regionuser')->middleware('admin');
Route::post('/saveregion', 'UserController@storeregion');
Route::get('/regionale-edit/{id}', 'UserController@editregion');
Route::put('/regionale-update/{id}', 'UserController@updateregion');
Route::delete('/regionale-delete/{id}', 'UserController@deleteregion');
Route::post('/saveetabliss', 'UserController@storeetabliss');
Route::get('/etablissement-edit/{id}', 'UserController@editetabliss');
Route::put('/etablissement-update/{id}', 'UserController@updateetabliss');
Route::delete('/etablissement-delete/{id}', 'UserController@deleteetabliss');



//centrale
Route::get('/layouts/centraluser', 'UserController@indexcentral');
Route::post('/savecentral', 'UserController@storecentral');
Route::get('/centrale-edit/{id}', 'UserController@editcentral');
Route::put('/centrale-update/{id}', 'UserController@updatecentral');
Route::delete('/centrale-delete/{id}', 'UserController@deletecentral');
//absence eleve
Route::get('/layouts/absenceeleve', 'AbsenceeleveController@index');
Route::post('/saveeleve', 'AbsenceeleveController@store');
Route::get('/abseleve-edit/{id}', 'AbsenceeleveController@edit');
Route::put('/abseleve-update/{id}', 'AbsenceeleveController@update');
Route::delete('/abseleve-delete/{id}', 'AbsenceeleveController@delete');
Route::get('/layouts/rapabsenceeleve', 'AbsenceeleveController@rapportetabl');
Route::get('/layouts/rapregabsenceeleve', 'AbsenceeleveController@rapportregional');
Route::get('/layouts/rapabselevecent', 'AbsenceeleveController@rapportcentrale');
Route::get('/layouts/abselevestat', 'AbsenceeleveController@stat');
Route::get('/layouts/abselevestatcente', 'AbsenceeleveController@statcentrale');
//absence enseg
Route::get('/layouts/absenceenseg', 'AbsenceensegController@index');
Route::post('/saveensg', 'AbsenceensegController@store');
Route::get('/absensg-edit/{id}', 'AbsenceensegController@edit');
Route::put('/absensg-update/{id}', 'AbsenceensegController@update');
Route::delete('/absensg-delete/{id}', 'AbsenceensegController@delete');
Route::get('/layouts/rapabsenceenseg', 'AbsenceensegController@rapportetabl');
Route::get('/layouts/rapregabsenceenseg', 'AbsenceensegController@rapportregional');
Route::get('/layouts/rapabsenscnte', 'AbsenceensegController@rapportcentrale');
Route::get('/layouts/absensegstat', 'AbsenceensegController@stat');
Route::get('/layouts/absensstatcnte', 'AbsenceensegController@statcentrale');
//activite
Route::get('/layouts/activite', 'ActiviteController@index');
Route::post('/saveact', 'ActiviteController@store');
Route::get('/act-edit/{id}', 'ActiviteController@edit');
Route::put('/act-update/{id}', 'ActiviteController@update');
Route::delete('/act-delete/{id}', 'ActiviteController@delete');
Route::get('/layouts/rapactivite', 'ActiviteController@rapportetabl');
Route::get('/layouts/rapregactivite', 'ActiviteController@rapportregional');
Route::get('/layouts/rapactivitecnte', 'ActiviteController@rapportcentrale');
Route::get('/layouts/activitestat', 'ActiviteController@stat');
Route::get('/layouts/activstatcnte', 'ActiviteController@statcentrale');
//communication
Route::get('/layouts/communication', 'CommunicationController@index');
Route::post('/savecomun', 'CommunicationController@store');
Route::get('/comun-edit/{id}', 'CommunicationController@edit');
Route::put('/comun-update/{id}', 'CommunicationController@update');
Route::delete('/comun-delete/{id}', 'CommunicationController@delete');
Route::get('/layouts/rapcommunication', 'CommunicationController@rapportetabl');
Route::get('/layouts/rapregcommunication', 'CommunicationController@rapportregional');
Route::get('/layouts/rapcomuncnte', 'CommunicationController@rapportcentrale');
Route::get('/layouts/communicationstat', 'CommunicationController@stat');
Route::get('/layouts/comunstatcnte', 'CommunicationController@statcentrale');
//recommondation
Route::get('/layouts/recommondation', 'RecommondationController@index');
Route::post('/saverecom', 'RecommondationController@store');
Route::get('/recom-edit/{id}', 'RecommondationController@edit');
Route::put('/recom-update/{id}', 'RecommondationController@update');
Route::delete('/recom-delete/{id}', 'RecommondationController@delete');
//dossier medical
Route::get('/layouts/dossiermedical', 'DossiermedicalController@index');
Route::post('/savedossier', 'DossiermedicalController@store');
Route::get('/dossier-edit/{id}', 'DossiermedicalController@edit');
Route::put('/dossier-update/{id}', 'DossiermedicalController@update');
Route::delete('/dossier-delete/{id}', 'DossiermedicalController@delete');
//region abseleve
Route::get('/layouts/indabselreg', 'AbsenceeleveController@indexregion');
Route::post('/saveelevereg', 'AbsenceeleveController@storeregion');
Route::get('/abselevereg-edit/{id}', 'AbsenceeleveController@editregion');
Route::put('/abselevereg-update/{id}', 'AbsenceeleveController@updateregion');
Route::delete('/abselevereg-delete/{id}', 'AbsenceeleveController@deleteregion');
//region absenseg
Route::get('/layouts/indabsensegreg', 'AbsenceensegController@indexregion');
Route::post('/saveensgreg', 'AbsenceensegController@storeregion');
Route::get('/absensgreg-edit/{id}', 'AbsenceensegController@editregion');
Route::put('/absensgreg-update/{id}', 'AbsenceensegController@updateregion');
Route::delete('/absensgreg-delete/{id}', 'AbsenceensegController@deleteregion');
//region activite
Route::get('/layouts/indactreg', 'ActiviteController@indexregion');
Route::post('/saveactreg', 'ActiviteController@storeregion');
Route::get('/actreg-edit/{id}', 'ActiviteController@editregion');
Route::put('/actreg-update/{id}', 'ActiviteController@updateregion');
Route::delete('/actreg-delete/{id}', 'ActiviteController@deleteregion');
//comunication region
Route::get('/layouts/indcomunreg', 'CommunicationController@indexregion');
Route::post('/savecomunreg', 'CommunicationController@storeregion');
Route::get('/comunreg-edit/{id}', 'CommunicationController@editregion');
Route::put('/comunreg-update/{id}', 'CommunicationController@updateregion');
Route::delete('/comunreg-delete/{id}', 'CommunicationController@deleteregion');
//recomondation region
Route::get('/layouts/indrecomreg', 'RecommondationController@indexregion');
Route::post('/saverecomreg', 'RecommondationController@storeregion');
Route::get('/recomreg-edit/{id}', 'RecommondationController@editregion');
Route::put('/recomreg-update/{id}', 'RecommondationController@updateregion');
Route::delete('/recomreg-delete/{id}', 'RecommondationController@deleteregion');
//dossier region
Route::get('/layouts/inddossierreg', 'DossiermedicalController@indexregion');
Route::post('/savedossierreg', 'DossiermedicalController@storeregion');
Route::get('/dossierreg-edit/{id}', 'DossiermedicalController@editregion');
Route::put('/dossierreg-update/{id}', 'DossiermedicalController@updateregion');
Route::delete('/dossierreg-delete/{id}', 'DossiermedicalController@deleteregion');

Route::get('/layouts/recomcentrale', 'RecommondationController@indexcentrale');