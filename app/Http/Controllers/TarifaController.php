<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;
use App\Http\Requests\TarifaRequest;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tarifas = Tarifa::all();

        return view('tarifas.index', compact('tarifas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadotarifa(Request $request)
	{
		$model = Tarifa::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tarifas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarifaRequest $request)
    {
        //
        $model = new Tarifa();
        $model->valor_hora = $request->hora;
        $model->valor_parcial = $request->parcial;
        $model->valor_dia = $request->dia;
        $model->valor_mensuales = $request->mensual;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();
        return redirect()->route('tarifas.index')->with('successMsg', 'El registro se creó exitosamente');

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
        $tarifa = Tarifa::find($id);
       
        return view('tarifas.edit', compact("tarifa"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarifaRequest $request, Tarifa $tarifa)
    {
        $tarifa->update($request->all());
        return redirect()->route('tarifas.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $ciudad->delete(); sin id, se le pasa el objeto completo
        try {
            //Con ID
            $model = Tarifa::find($id);
            $model->delete();
            return redirect()->route('tarifas.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('tarifas.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('tarifas.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
