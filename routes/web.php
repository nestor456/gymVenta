<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\AsistenciaClienteController;
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
/*Route::get('/empleado', function () {
    return view('empleado.index');
});*/

//Route::get('/empleado/create',[EmpleadoController::class,'create']);


Auth::routes(['register'=>true, 'reset'=>false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function() {
    //
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('empleado',EmpleadoController::class);
    Route::resource('area',AreaController::class);
    Route::resource('membresia',MembresiaController::class);
    Route::resource('producto',ProductoController::class);
    Route::resource('cliente',ClienteController::class);
    Route::resource('venta',VentaController::class);
    Route::resource('asistencia',AsistenciaController::class);
    Route::resource('asistencia_cliente',AsistenciaClienteController::class);

    Route::get('venta/pdf/{venta}', [VentaController::class, 'pdf'])->name('venta.pdf');
    
    Route::get('reporte/reports_day',[ReporteController::class, 'reports_day'])->name('reports.day');
    Route::get('reporte/reports_date',[ReporteController::class, 'reports_date'])->name('reports.date');
    Route::post('reporte/report_results',[ReporteController::class, 'report_results'])->name('report.results');

    
});




