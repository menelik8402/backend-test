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

/* Route::get('/send/emails','App\Http\Controllers\MailController@sendEmail');

Route::post('/one/user','App\Http\Controllers\MailController@create');

Route::post('/save/emails','App\Http\Controllers\EmailautomatedController@store');
 */

Route::get('/all','App\Http\Controllers\VehiculoController@index');
Route::post('/entrada/vehiculo','App\Http\Controllers\RegistroVehController@store');
Route::put('/salida/vehiculo','App\Http\Controllers\RegistroVehController@updateVehicleOut');
