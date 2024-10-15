<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\DisposicionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\DepreciacionController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/', function () {
//     return view('home');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('ubicaciones', UbicacionController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('activos', ActivoController::class);
Route::resource('disposiciones', DisposicionController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('mantenimientos', MantenimientoController::class);
Route::resource('depreciaciones', DepreciacionController::class);

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('ubicaciones', UbicacionController::class);
    Route::resource('departamentos', DepartamentoController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('activos', ActivoController::class);
    Route::resource('disposiciones', DisposicionController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('mantenimientos', MantenimientoController::class);
    Route::resource('depreciaciones', DepreciacionController::class);

    Route::put('/disposiciones/{disposicion}', [DisposicionController::class, 'update'])->name('disposiciones.update');
});

Route::put('/disposiciones/{disposicion}', [DisposicionController::class, 'update'])->name('disposiciones.update');

Route::get('/home', function () { return view('home');
})->middleware('auth');

Route::put('/ubicaciones/{id}', [UbicacionController::class, 'update'])->name('ubicaciones.update');
