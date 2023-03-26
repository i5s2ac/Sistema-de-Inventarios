<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('items', ItemController::class);
Route::post('/asignar/{id}', [ItemController::class, 'asignar'])->name('assign');
Route::post('/desasignar/{id}', [ItemController::class, 'desasignar'])->name('unassign');


Route::resource('empleados', EmpleadoController::class);

Route::resource('departamentos', DepartamentoController::class);

