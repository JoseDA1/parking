<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahia;

class BahiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bahias = Bahia::all();

        return view('bahias.index', compact('bahias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadobahia(Request $request)
	{
		$bahias = Bahia::find($request->id);
		$bahias->estado=$request->estado;
		$bahias->save();
	}
    public function create()
    {
        //
        return view('bahias.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $model = new Bahia();
        $model->numero_bahia = $request->numero_bahia;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();
		// $model = Bahia::create($request->all());
        return redirect()->route('bahias.index')->with('successMsg', 'El registro se creó exitosamente');
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
            $model = Bahia::find($request->id);
            $model->delete();
            return redirect()->route('ciudads.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('ciudads.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('ciudads.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
