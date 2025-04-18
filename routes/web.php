<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', function () {
    Auth::logout(); // Desloguea al usuario
    return redirect('/'); // Redirige al usuario al home o a cualquier otra página
})->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/vehiculos', [VehiculoController::class,'index'])->name('vehiculos.index');
    Route::post('/vehiculos', [VehiculoController::class,'store'])->name('vehiculos.store');
    Route::get('/vehiculos/create', [VehiculoController::class,'create'])->name('vehiculos.create');
    Route::delete('/vehiculos/{vehiculo}', [VehiculoController::class,'destroy'])->name('vehiculos.destroy');
    Route::put('/vehiculos/{vehiculo}', [VehiculoController::class,'update'])->name('vehiculos.update');
    Route::get('/vehiculos/{vehiculo}/edit', [VehiculoController::class,'edit'])->name('vehiculos.edit');
});

require __DIR__.'/auth.php';
