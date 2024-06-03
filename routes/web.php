<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('socios/{id}/pdf', [App\Http\Controllers\SocioController::class, 'pdf'] )->name('socios.pdf');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

    //Route::get('/socios',Socios::class);
    Route::resource('socios','App\Http\Controllers\SocioController');
    Route::resource('personas','App\Http\Controllers\PersonaController');
    Route::resource('maquinarias','App\Http\Controllers\MaquinariaController');
    Route::resource('asistencias','App\Http\Controllers\AsistenciaController');

    Route::view('selects','selects');

    Route::get('/socios/provinciasByDep/{id}','App\Http\Controllers\SocioController@provinciasByDep');
    Route::get('/socios/distritosByProv/{id}','App\Http\Controllers\SocioController@distritosByProv');

