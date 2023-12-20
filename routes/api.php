<?php

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
use App\Http\Controllers\ProyectController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/portafolio/{project}/restore', [ProyectController::class,'restore'])->name('projects.restore');

Route::middleware('auth:sanctum')->group( function() {
    Route::get('/token',function () {
        return "Hola mundo";
    });
});



