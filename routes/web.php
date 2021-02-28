<?php

use Illuminate\Support\Facades\Route;
use App\Models\Venta;
use App\Models\Coleccion;
use App\Models\IndiceColeccion;
use App\Models\Carta;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

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
	$ventas = Venta::latest()->take(10)->get();
    return view('index')->with('ventas', $ventas);
});

Route::get('/ventas', function (){
	$ventas = Venta::all();
	return view('ventas')->with('ventas', $ventas);
});

Route::get('/colecciones', function (){
	$colecciones = Coleccion::all();
	return view('colecciones')->with('colecciones', $colecciones);
});

Route::get('/login', function (){
	return view('login');
});

Route::get('/registro', function (){
	return view('registro');
});

Route::get('/password', function (){
	return view('password');
});

Route::get('/crear', function (){
	return view('crear');
});

Route::get('/vender', function (){
	return view('vender');
});

