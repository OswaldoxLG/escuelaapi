<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoControllerAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Alumnos
Route::get('/consultar-api', [AlumnoControllerAPI::class, 'getData']);
Route::get('/consultar2-api/{id_alumno}', [AlumnoControllerAPI::class,'getData2']);
Route::post('/alta-api', [AlumnoControllerAPI::class, 'postData']);
Route::put('/actualizar-api/{id_alumno}', [AlumnoControllerAPI::class,'updateData']);
Route::delete('/borrar-api/{id_alumno}', [AlumnoControllerAPI::class, 'deleteData']);
Route::get('/alu/{id_alumno}/edit', [AlumnoControllerAPI::class,'edit']);
Route::get('alu/create', [AlumnoControllerAPI::class,'createData']);