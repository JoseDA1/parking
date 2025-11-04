<?php

namespace App\Http\Controllers;
use App\Models\Tipos_Vehiculo;
use App\Models\Tarifa;

use Illuminate\Http\Request;

class Tipos_VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Tipos_Vehiculo::all();

        return view('tipos_vehiculos.index', compact('model'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadotipovehiculo(Request $request)
	{
		$model = Tipos_Vehiculo::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tarifa = Tarifa::where('estado', '=', 1)->get();
        return view('tipos_vehiculos.create', compact('tarifa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $model = new Tipos_Vehiculo();
        $model->nombre = $request->nombre;
        $model->tarifas_id = $request->tarifa;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();
        return redirect()->route('tiposvehiculos.index')->with('successMsg', 'El registro se creó exitosamente');

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
            $model = Tipos_Vehiculo::find($id);
            $model->delete();
            return redirect()->route('tiposvehiculos.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('tiposvehiculos.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('tiposvehiculos.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
