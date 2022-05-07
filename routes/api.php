<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/empresa', [EmpresaController::class, 'cadastrar'])->name('empresa.cadastro');
Route::get('/empresa', [EmpresaController::class, 'listar'])->name('empresa.listar');
Route::get('/empresa/{id}', [EmpresaController::class, 'buscar'])->name('empresa.buscar');
Route::put('/empresa/{id}', [EmpresaController::class, 'atualizar'])->name('empresa.atualizar');
Route::delete('/empresa/{id}', [EmpresaController::class, 'apagar'])->name('empresa.apagar');