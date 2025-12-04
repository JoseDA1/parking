<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use App\Http\Requests\MarcaRequest;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Marca::all();

        return view('marcas.index', compact('model'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadomarca(Request $request)
	{
		$model = Marca::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarcaRequest $request)
    {
        //
        $model = new Marca();
        $model->nombre = $request->nombre;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();
        return redirect()->route('marcas.index')->with('successMsg', 'El registro se creó exitosamente');

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
        $marca = Marca::find($id);
        return view('marcas.edit', compact("marca"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarcaRequest $request, Marca $marca)
    {
        $marca->update($request->all());
        return redirect()->route('marcas.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $ciudad->delete(); sin id, se le pasa el objeto completo
        try {
            //Con ID
            $model = Marca::find($id);
            $model->delete();
            return redirect()->route('marcas.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('marcas.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('marcas.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
