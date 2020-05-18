<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource("/afectats", "Api\AfectatController");
Route::apiResource("/alertant", "Api\AlertantController");
Route::apiResource("/comarques", "Api\ComarcaController");
Route::apiResource("/estat_incidencia", "Api\EstatIncidenciaController");
Route::apiResource("/incidencies", "Api\IncidenciaController");
Route::apiResource("/municipis", "Api\MunicipiController");
Route::apiResource("/provincies", "Api\ProvinciaController");
Route::apiResource("/recursos", "Api\RecursController");
Route::apiResource("/rols", "Api\RolController");
Route::apiResource("/tipo_alertant", "Api\TipoAlertantController");
Route::apiResource("/tipo_incident", "Api\TipoIncidentController");
Route::apiResource("/tipo_recurs", "Api\TipoRecursController");
Route::apiResource("/usuaris", "Api\UsuariController");
/*Route::apiResource('afectats', 'Api\AfectatController');
Route::apiResource('alertant", "Api\AlertantController');
Route::apiResource('comarques', 'Api\ComarcaController');
Route::apiResource('estat_incidencia', 'Api\EstatIncidenciaController');
Route::apiResource('home', 'Api\HomeController');
Route::apiResource('incidencies', 'Api\IncidenciaController');
Route::apiResource('municipis', 'Api\MunicipiController');
Route::apiResource('provincies', 'Api\ProvinciaController');
Route::apiResource('recursos', 'Api\RecursController');
Route::apiResource('rols', 'Api\RolController');
Route::apiResource('tipo_alertant', 'Api\TipoAlertantController');
Route::apiResource('tipo_incident', 'Api\TipoIncidentController');
Route::apiResource('tipo_recurs', 'Api\TipoRecursController');
Route::apiResource('usuaris', 'Api\UsuariController');*/

Route::get("/tipo_recurs", "Api\TipoRecursController@index");
Route::get("/tipo_recurs/{id}", "Api\TipoRecursController@show");


Route::post("omplirincidencies", "Api\IncidenciaController@store")->name('omplirincidencies');

Route::get("mostrarFormulari", "Api\IncidenciaController@mostrarFormulari")->name('mostrarFormulari');

Route::get("/recursos/{id}", "Api\RecursController@show");