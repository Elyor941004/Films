<?php

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
Route::get('/janrs', [App\Http\Controllers\ApiController::class, 'Janrs'])->name('Janrs');
Route::get('/films/{id}', [App\Http\Controllers\ApiController::class, 'Films'])->name('Films');
Route::get('/allfilm', [App\Http\Controllers\ApiController::class, 'AllFilm'])->name('AllFilm');
Route::get('/film/{id}', [App\Http\Controllers\ApiController::class, 'Film'])->name('Film');