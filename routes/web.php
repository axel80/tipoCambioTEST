<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Network\ServicioSoapController;
use App\Http\Controllers\PeticionesController;

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
    return redirect('home');
});

Auth::routes();

Route::get('logout', [LoginController::class, 'logout']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get("/variables-disponibles", [ServicioSoapController::class, "getVariablesDisponibles"])->name('varibles.disponible');
Route::get("/tipo-cambio-rango/{init?}/{fin?}/{tipoRango?}/{moneda?}", [ServicioSoapController::class, "obtenerCambioRango"])->name('tc.rango');
Route::get("/tipo-cambio-fechainicial/{init?}", [ServicioSoapController::class, "obtenerCambioFechaInicial"])->name('tc.fechaInicial');


Route::get("/peticiones", [PeticionesController::class, 'pedicionesView'])->name('peticiones.view');
Route::post("/peticion/tipo-cambio-rango", [PeticionesController::class, 'peticionTC'])->name('peticiones.tc');
Route::get("/peticion/lista", [PeticionesController::class, 'getLista'])->name('peticiones.tc-lista');





Route::get('optimize-app', [HomeController::class, 'optimize'])->name('opitimize');

