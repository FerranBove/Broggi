<?php




Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/home','HomeController@index');
Route::get('/recursos','RecursController@index')->name('recursos');

Route::get('/novaIncidencia', 'IncidenciaController@mostrarFormulari');

Route::get('/taulaIncidencia', 'IncidenciaController@mostrarTaula')->name('taulaIncidencia');
Route::get('/taulaGeneral', 'IncidenciaController@mostrarTaulaGeneral');

// //todas las rutas que se necessite autorizacion para entrar
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/home','HomeController@index');
// });