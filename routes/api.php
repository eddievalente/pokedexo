<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

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

Route::get('/list', [PokemonController::class, 'index']);

Route::prefix('/pokemon')->group( function() {
  
  Route::get('/{id}', [PokemonController::class, 'show']);
  Route::put('/{id}', [PokemonController::class, 'update']);
}

);

