<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\InspencaoController;
use App\Http\Controllers\MovimentacaoController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('utilizadores')->group(function(){
    // rotas do modulo utilizadores
    Route::get('/', [UtilizadorController::class, 'index']);
    Route::get('/{id}', [UtilizadorController::class, 'show']);
    Route::post('/', [UtilizadorController::class, 'store']);
    Route::put('/{id}', [UtilizadorController::class, 'update']);
    Route::delete('/{id}', [UtilizadorController::class, 'destroy']);
    Route::post('/login', [UtilizadorController::class, 'login']); 

});

 //grupo de rotas para o modulo locais
Route::prefix('locais')->group(function(){
    // rotas do modulo locais
    Route::get('/', [LocalController::class, 'index']);
    Route::get('/{id}', [LocalController::class, 'show']);
    Route::post('/', [LocalController::class, 'store']);
    Route::put('/{id}', [LocalController::class, 'update']);
    Route::delete('/{id}', [LocalController::class, 'destroy']);
});

 //grupo de rotas para o modulo materiaias
Route::prefix('materiais')->group(function(){
    // rotas do modulo materiais
    Route::get('/', [MaterialController::class, 'index']);
    Route::get('/{id}', [MaterialController::class, 'show']);
    Route::post('/', [MaterialController::class, 'store']);
    Route::put('/{id}', [MaterialController::class, 'update']);
    Route::delete('/{id}', [MaterialController::class, 'destroy']);
});

 //grupo de rotas para o modulo inspeções
Route::prefix('inspecoes')->group(function(){
    // rotas do modulo inspecoes
    Route::get('/', [InspencaoController::class, 'index']);
    Route::get('/{id}', [InspencaoController::class, 'show']);
    Route::post('/', [InspencaoController::class, 'store']);
    Route::put('/{id}', [InspencaoController::class, 'update']);
    Route::delete('/{id}', [InspencaoController::class, 'destroy']);
});

 //grupo de rotas para o modulo movimentações
Route::prefix('movimentacoes')->group(function(){
    // rotas do modulo movimentacoes
    Route::get('/', [MovimentacaoController::class, 'index']);
    Route::get('/{id}', [MovimentacaoController::class, 'show']);
    Route::post('/', [MovimentacaoController::class, 'store']);
    Route::put('/{id}', [MovimentacaoController::class, 'update']);
    Route::delete('/{id}', [MovimentacaoController::class, 'destroy']);
});