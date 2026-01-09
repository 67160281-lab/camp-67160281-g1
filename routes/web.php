<?php

use Illuminate\Support\Facades\Route;

Route::get('/se', function(){
    return view('template.default');
});


Route::get('/', [App\Http\Controllers\MyController::class, 'index']);
Route::post('/', [App\Http\Controllers\MyController::class, 'store']);
Route::get('/calculate', [App\Http\Controllers\MyController::class, 'info']);
Route::post('/calculate', [App\Http\Controllers\MyController::class, 'calculate']);

Route::resource('/flights', App\Http\Controllers\FlightController::class);
Route::resource('/pokedexs', App\Http\Controllers\PokedexController::class);
