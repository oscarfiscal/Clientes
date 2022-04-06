<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/clientes/{cliente}/detalles','App\Http\Controllers\ClientController@detalles') -> name('clientes.detalles');
    Route::resource('/clientes', ClientController::class);
    Route::resource('/servicios', ServiceController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

