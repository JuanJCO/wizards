<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\IndiceColeccionController;
use App\Http\Controllers\VentaController;

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

Route::prefix('usuarios')->group(function () {
	Route::post('/registrar',[UsuarioController::class,"store"]);
	Route::post('/login',[UsuarioController::class,"login"]);
	Route::post('/resetpass',[UsuarioController::class,"recuperarPassword"]);
	Route::post('/venta',[VentaController::class,"store"])->middleware('venta');
	Route::get('/logout',[UsuarioController::class,"logout"]);
});

Route::prefix('cartas')->group(function () {
	Route::post('/registrar',[CartaController::class,"store"])->middleware('rango');
	Route::post('/filtrarNombre',[CartaController::class,"filtrarNombre"]);
	Route::get('/',[CartaController::class,"index"]);
});

Route::prefix('colecciones')->group(function () {
	Route::post('/registrar',[ColeccionController::class,"store"])->middleware('rango');
});
