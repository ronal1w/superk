<?php

use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\AreaControllers;
use App\Models\Area;
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


//Route::get('/area', ['App\Http\Controllers\AreaControllers@indexArea']);
//Route::get('/area', [AreaControllers::class, 'index']);
Route::get('areas', [AreaController::class, 'index']);
Route::get('areas/{id}', [AreaController::class, 'show']);
Route::get('areas-nombre/{id}', [AreaController::class, 'mostrarArea']);
Route::get('mostrar-areas', [AreaController::class, 'mostrarAreas']);
Route::post('crear-areas', [AreaController::class, 'store']);
//Route::put('/areas/{id}', [AreaController::class, 'update']);
Route::put('areas/{id}', [AreaController::class, 'update']);

