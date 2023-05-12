<?php

use App\Http\Controllers\API\CategoriaController;
use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\AreaControllers;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Api\VentaController;
use App\Models\Area;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Rutas de areas
//Route::get('/area', ['App\Http\Controllers\AreaControllers@indexArea']);
//Route::get('/area', [AreaControllers::class, 'index']);
Route::get('areas', [AreaController::class, 'index']);
Route::get('areas/{id}', [AreaController::class, 'show']);
Route::get('areas-nombre/{id}', [AreaController::class, 'mostrarArea']);
Route::get('mostrar-areas', [AreaController::class, 'mostrarAreas']);
Route::post('crear-areas', [AreaController::class, 'store']);
//Route::put('/areas/{id}', [AreaController::class, 'update']);
Route::put('areas/{id}', [AreaController::class, 'update']);

//Route::delete('/areas/{id}', [AreaController::class, 'destroy']);
Route::delete('/areas/{id}', [AreaController::class, 'destroy']);




//Rutas de areas 
Route::get('/mostrar-categorias', [CategoriaController::class, 'mostrarCategorias']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::get('/mostrar-categorias/{id}', [CategoriaController::class, 'mostrarRegistro']);
Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

// ruta de los productos
Route::get('/mostrar-producto', [ProductoController::class, 'MostrarPorductos']);
Route::post('/crea-producto', [ProductoController::class, 'crearProducto']);
Route::get('mostrar-producto/{id}', [ProductoController::class, 'show']);
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

//Rutas de las ventas 
Route::get('ventas', [VentaController::class, 'index']);
Route::post('ventas', [VentaController::class, 'store']);
Route::get('ventas/{venta}', [VentaController::class, 'show']);
Route::put('ventas/{venta}', [VentaController::class, 'update']);
Route::delete('ventas/{venta}', [VentaController::class, 'destroy']);

