<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/********************************************************************************************
 *                              Rutas de la tabla vehiculo                                  *    
 ********************************************************************************************/
Route::get('/todos','App\Http\Controllers\VehiculoController@index');
Route::post('/guadar/vehiculo','App\Http\Controllers\VehiculoController@store');

/********************************************************************************************
 *                              Rutas de la tabla Registro de vehiculo                      *    
 ********************************************************************************************/
Route::post('/entrada/vehiculo','App\Http\Controllers\RegistroVehController@store');
Route::put('/salida/vehiculo','App\Http\Controllers\RegistroVehController@updateVehicleOut');
Route::get('/informe/clientes','App\Http\Controllers\RegistroVehController@index');
