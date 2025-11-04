<?php

namespace App\Http\Controllers;
use App\Models\Registro;
use App\Models\Bahia;
use App\Models\Vehiculo;
use App\Models\Cliente;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Registro::all();

        return view('registros.index', compact('model'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadoregistro(Request $request)
	{
		$model = Registro::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cliente = Cliente::where('estado', '=', 1)->orderBy('nombre')->get();
        $bahia = Bahia::where('estado', '=', 1)->orderBy('numero_bahia')->get();
        $vehiculo = Vehiculo::where('estado', '=', 1)->orderBy('placa')->get();
        return view('registros.create', compact('cliente', 'bahia', 'vehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $model = new Registro();
        $model->bahias_id = $request->bahia;
        $model->vehiculos_id = $request->vehiculo;
        $model->clientes_id = $request->cliente;
        $model->fecha_ingreso = $request->fecha_ingreso;
        $model->fecha_salida = $request->fecha_salida;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();
        return redirect()->route('registros.index')->with('successMsg', 'El registro se creó exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $ciudad->delete(); sin id, se le pasa el objeto completo
        try {
            //Con ID
            $model = Registro::find($id);
            $model->delete();
            return redirect()->route('registros.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('registros.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('registros.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
