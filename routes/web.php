<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vehiculos', [VehiculoController::class,'index'])->name('vehiculos.index');
Route::post('/vehiculos', [VehiculoController::class,'store'])->name('vehiculos.store');
Route::get('/vehiculos/create', [VehiculoController::class,'create'])->name('vehiculos.create');
Route::delete('/vehiculos/{vehiculo}', [VehiculoController::class,'destroy'])->name('vehiculos.destroy');
Route::put('/vehiculos/{vehiculo}', [VehiculoController::class,'update'])->name('vehiculos.update');
Route::get('/vehiculos/{vehiculo}/edit', [VehiculoController::class,'edit'])->name('vehiculos.edit');