<?php

use App\Http\Controllers\TipoAlquilerController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\ReporteController;





use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    
});

//TIPO ALQUILER
Route::get('tipo-alquiler', [TipoAlquilerController::class, 'index']);
Route::get('tipo-alquiler/create', [TipoAlquilerController::class, 'create']);
Route::post('tipo-alquiler', [TipoAlquilerController::class, 'store']);
Route::get('tipo-alquiler/{id}/edit', [TipoAlquilerController::class, 'edit']);
Route::post('tipo-alquiler/actualizar/{id}', [TipoAlquilerController::class, 'update']);
Route::post('tipo-alquiler/delete/{id}', [TipoAlquilerController::class, 'destroy']);
 //ALQUILER
 Route::get('alquiler', [AlquilerController::class, 'index']);
 Route::get('alquiler/create', [AlquilerController::class, 'create']);
 Route::post('alquiler', [AlquilerController::class, 'store']);
 Route::get('alquiler/{id}/edit', [AlquilerController::class, 'edit']);
 Route::post('alquiler/actualizar/{id}', [AlquilerController::class, 'update']);
 Route::post('alquiler/delete/{id}', [AlquilerController::class, 'destroy']);
  
  //CLIENTE
  Route::get('cliente', [ClienteController::class, 'index']);
  Route::get('cliente/create', [ClienteController::class, 'create']);
  Route::post('cliente', [ClienteController::class, 'store']);
  Route::get('cliente/{id}/edit', [ClienteController::class, 'edit']);
  Route::post('cliente/actualizar/{id}', [ClienteController::class, 'update']);
  Route::post('cliente/delete/{id}', [ClienteController::class, 'destroy']);
   
  //ESPECIE
  Route::get('especie', [EspecieController::class, 'index']);
  Route::get('especie/create', [EspecieController::class, 'create']);
  Route::post('especie', [EspecieController::class, 'store']);
  Route::get('especie/{id}/edit', [EspecieController::class, 'edit']);
  Route::post('especie/actualizar/{id}', [EspecieController::class, 'update']);
  Route::post('especie/delete/{id}', [EspecieController::class, 'destroy']);
   
   //Raza
   Route::get('raza', [RazaController::class, 'index']);
   Route::get('raza/create', [RazaController::class, 'create']);
   Route::post('raza', [RazaController::class, 'store']);
   Route::get('raza/{id}/edit', [RazaController::class, 'edit']);
   Route::post('raza/actualizar/{id}', [RazaController::class, 'update']);
   Route::post('raza/delete/{id}', [RazaController::class, 'destroy']);
     
   Route::get('raza/buscarespecie/{id}', [MascotaController::class, 'buscarespecie']);
 
 
 //Mascota
  Route::get('mascota', [MascotaController::class, 'index']);
Route::get('mascota/create', [MascotaController::class, 'create']);
Route::post('mascota', [MascotaController::class, 'store']);
//   Route::get('alquiler/{id}/edit', [AlquilerController::class, 'edit']);
  Route::post('mascota/actualizar/{id}', [MascotaController::class, 'update']);
  Route::post('mascota/delete/{id}', [MascotaController::class, 'destroy']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('mascota/buscaraza/{id}', [MascotaController::class, 'searchraza']);

Route::get('reporte', [ReporteController::class, 'index']);
Route::get('reporte/searchmascota', [ReporteController::class, 'searchmascota']);


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

