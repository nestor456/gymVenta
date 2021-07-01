<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
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
    return view('auth.login');
});
Route::get('/empleado', function () {
    return view('empleado.index');
});

//Route::get('/empleado/create',[EmpleadoController::class,'create']);


Auth::routes(['register'=>true, 'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function() {
    //
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('empleado',EmpleadoController::class);
    Route::resource('area',AreaController::class);
    Route::resource('membresia',MembresiaController::class);
    Route::resource('producto',ProductoController::class);
    Route::resource('cliente',ClienteController::class);
});




