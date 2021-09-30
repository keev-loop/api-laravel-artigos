<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigoController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// List artigos
Route::get('artigos', [ArtigoController::class, 'index']);

// List single artigo
Route::get('artigo/{id}', [ArtigoController::class, 'show']);

// Create new artigo
Route::post('artigo', [ArtigoController::class, 'store']);

// Update artigo
Route::put('artigo/{id}', [ArtigoController::class, 'update']);

// Delete artigo
Route::delete('artigo/{id}', [ArtigoController::class,'destroy']);