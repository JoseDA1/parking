<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ClienteController;
// use App\Http\Controllers\MarcaController;
// use App\Http\Controllers\Tipos_DocumentoController;
// use App\Http\Controllers\RegistroController;
// use App\Http\Controllers\PagoController;
// use App\Http\Controllers\Metodos_PagoController;
// use App\Http\Controllers\VehiculoController;
// use App\Http\Controllers\Tipos_VehiculoController;
use App\Http\Controllers\BahiaController;
// use App\Http\Controllers\TarifaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::resource('clientes', ClienteController::class);
    // Route::resource('marcas', MarcaController::class);
    // Route::resource('tipodocumento', Tipos_DocumentoController::class);
    // Route::resource('registros', RegistroController::class);
    // Route::resource('pagos', PagoController::class);
    // Route::resource('metodospago', Metodos_PagoController::class);
    // Route::resource('vehiculo', VehiculoController::class);
    // Route::resource('tipovehiculo', Tipos_VehiculoController::class);
    Route::resource('bahias', BahiaController::class);
    Route::get('cambioestadobahia', [BahiaController::class, 'cambioestadobahia'])->name('cambioestadobahia');

    // Route::resource('tarifas', TarifaController::class);
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




