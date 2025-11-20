<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\Tipos_DocumentoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\Metodos_PagoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\Tipos_VehiculoController;
use App\Http\Controllers\BahiaController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\SalidaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/404', function () {
    abort(404);
});
Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('bahias', BahiaController::class);
    Route::get('cambioestadobahia', [BahiaController::class, 'cambioestadobahia'])->name('cambioestadobahia');
    Route::resource('tarifas', TarifaController::class);
    Route::get('cambioestadotarifa', [TarifaController::class, 'cambioestadotarifa'])->name('cambioestadotarifa');
    Route::resource('tipos_documentos', Tipos_DocumentoController::class);
    Route::get('cambioestadotiposdocumento', [Tipos_DocumentoController::class, 'cambioestadotiposdocumento'])->name('cambioestadotiposdocumento');
    Route::resource('metodospago', Metodos_PagoController::class);
    Route::get('cambioestadometodospago', [Metodos_PagoController::class, 'cambioestadometodospago'])->name('cambioestadometodospago');
    Route::resource('clientes', ClienteController::class);
    Route::get('cambioestadocliente', [ClienteController::class, 'cambioestadocliente'])->name('cambioestadocliente');
    Route::resource('marcas', MarcaController::class);
    Route::get('cambioestadomarca', [MarcaController::class, 'cambioestadomarca'])->name('cambioestadomarca');
    Route::resource('registros', RegistroController::class);
    Route::get('cambioestadoregistro', [RegistroController::class, 'cambioestadoregistro'])->name('cambioestadoregistro');
    Route::resource('pagos', PagoController::class);
    Route::get('cambioestadopago', [PagoController::class, 'cambioestadopago'])->name('cambioestadopago');
    Route::resource('vehiculos', VehiculoController::class);
    Route::get('cambioestadovehiculo', [VehiculoController::class, 'cambioestadovehiculo'])->name('cambioestadovehiculo');
    Route::resource('tiposvehiculos', Tipos_VehiculoController::class);
    Route::get('cambioestadotipovehiculo', [Tipos_VehiculoController::class, 'cambioestadotipovehiculo'])->name('cambioestadotipovehiculo');
    Route::resource('salidas', SalidaController::class);
    Route::get('cambioestadosalida', [SalidaController::class, 'cambioestadosalida'])->name('cambioestadosalida');
    Route::get('/pagos/obtenertotal', [PagoController::class, 'obtenerTotal'])->name('pagos.obtenerTotal');
});

/*Route::get('/', function(){
    return 'welcome';
});
Route::get('/about/{id}', function($id){
    return 'welcome '.$id;
})->where('id', '[0-9]{3}');
Route::get('/service', function(){
    return 'Service';
})->name('service');*/




