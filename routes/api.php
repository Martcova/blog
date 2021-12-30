<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ArticuloController;

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ViewUsuarioController;
use App\Http\Controllers\ViewArticuloController;
use App\Http\Controllers\ViewComentarioController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* endpoint rol */
Route::middleware('auth:sanctum')->get('roles', [RolController::class,'index']);
Route::middleware('auth:sanctum')->get('roles/{id}', [RolController::class,'show']);
Route::middleware('auth:sanctum')->post('roles', [RolController::class,'store']);
Route::middleware('auth:sanctum')->put('roles/{id}', [RolController::class,'update']);
Route::middleware('auth:sanctum')->delete('roles/{id}', [RolController::class,'destroy']);

/* endpoint usuarios */
Route::middleware('auth:sanctum')->get('users',[UsuarioController::class,'index']);
Route::middleware('auth:sanctum')->get('users/{id}', [UsuarioController::class,'show']);
Route::post('users', [UsuarioController::class,'store']);
Route::middleware('auth:sanctum')->put('users/{id}', [UsuarioController::class,'update']);
Route::middleware('auth:sanctum')->delete('users/{id}', [UsuarioController::class,'destroy']);

/* endpoint articulos */
Route::get('articulos', [ArticuloController::class,'index']);
Route::get('articulos/{id}', [ArticuloController::class,'show']);
Route::middleware('auth:sanctum')->post('articulos', [ArticuloController::class,'store']);
Route::middleware('auth:sanctum')->put('articulos/{id}', [ArticuloController::class,'update']);
Route::middleware('auth:sanctum')->delete('articulos/{id}', [ArticuloController::class,'destroy']);

/* endpoint comentarios */
Route::middleware('auth:sanctum')->get('comentarios', [ComentarioController::class,'index']);
Route::middleware('auth:sanctum')->get('comentarios/{id}', [ComentarioController::class,'show']);
Route::middleware('auth:sanctum')->post('comentarios', [ComentarioController::class,'store']);
Route::middleware('auth:sanctum')->put('comentarios/{id}', [ComentarioController::class,'update']);
Route::middleware('auth:sanctum')->delete('comentarios/{id}', [ComentarioController::class,'destroy']);

/* endpoint view_usuarios */
Route::middleware('auth:sanctum')->get('view_usuarios', [ViewUsuarioController::class,'index']);

/* endpoint view_articulos */
Route::get('view_articulos', [ViewArticuloController::class,'index']);

/* endpoint view_comentarios */
Route::middleware('auth:sanctum')->get('view_comentarios', [ViewComentarioController::class,'index']);

Route::post('login',[App\Http\Controllers\Auth\LoginController::class,'login']);

Route::middleware('auth:sanctum')->get('logout',[App\Http\Controllers\Auth\LoginController::class,'logout']);