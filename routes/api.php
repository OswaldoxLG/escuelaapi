<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoControllerAPI;
use App\Http\Controllers\UniversidadAPI;
use App\Http\Controllers\CarreraControllerAPI;
use App\Http\Controllers\GrupoControllerAPI;

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

//Universidades
Route::get('/consultar-api-uni', [UniversidadAPI::class, 'getData']);
Route::get('/consultar2-api-uni/{id_uni}', [UniversidadAPI::class,'getData2']);
Route::post('/alta-api-uni', [UniversidadAPI::class, 'postData']);
Route::put('/actualizar-api-uni/{id_uni}', [UniversidadAPI::class,'updateData']);
Route::delete('/borrar-api-uni/{id_uni}', [UniversidadAPI::class, 'deleteData']);
Route::get('/uni/{id_uni}/edit', [UniversidadAPI::class,'edit']);
Route::get('uni/create', [UniversidadAPI::class,'createData']);

//carreras
Route::get('/consultar-api-carrera', [CarreraControllerAPI::class, 'getData']);
Route::get('/consultar2-api-carrera/{id_carrera}', [CarreraControllerAPI::class,'getData2']);
Route::post('/alta-api-carrera', [CarreraControllerAPI::class, 'postData']);
Route::put('/actualizar-api-carrera/{id_carrera}', [CarreraControllerAPI::class,'updateData']);
Route::delete('/borrar-api-carrera/{id_carrera}', [CarreraControllerAPI::class, 'deleteData']);
Route::get('/carrera/{id_carrera}/edit', [CarreraControllerAPI::class,'edit']);
Route::get('carrera/create', [CarreraControllerAPI::class,'createData']);

//GRUPOS
Route::get('/consultar-api-grupo', [GrupoControllerAPI::class, 'getData']);
Route::get('/consultar2-api-grupo/{id_grupo}', [GrupoControllerAPI::class,'getData2']);
Route::post('/alta-api-grupo', [GrupoControllerAPI::class, 'postData']);
Route::put('/actualizar-api-grupo/{id_grupo}', [GrupoControllerAPI::class,'updateData']);
Route::delete('/borrar-api-grupo/{id_grupo}', [GrupoControllerAPI::class, 'deleteData']);
Route::get('/grupo/{id_grupo}/edit', [GrupoControllerAPI::class,'edit']);
Route::get('grupo/create', [GrupoControllerAPI::class,'createData']);