<?php

namespace App\Http\Controllers;
use App\Models\Tipos_Documento;
use App\Http\Requests\Tipos_DocumentoRequest;
use Illuminate\Http\Request;
class Tipos_DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Tipos_Documento::all();

        return view('tipos_documentos.index', compact('model'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadotiposdocumento(Request $request)
	{
		$model = Tipos_Documento::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tipos_documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Tipos_DocumentoRequest $request)
    {
        //
        $model = new Tipos_Documento();
        $model->nombre = $request->nombre;
        $model->abreviatura = $request->abreviatura;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();
        return redirect()->route('tipos_documentos.index')->with('successMsg', 'El registro se creó exitosamente');

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
        $tiposdocumento = Tipos_Documento::find($id);
       
        return view('tipos_documentos.edit', compact("tiposdocumento"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tipos_DocumentoRequest $request, Tipos_Documento $tiposdocumento)
    {
        $tiposdocumento->update($request->all());

        return redirect()->route('tipos_documentos.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $ciudad->delete(); sin id, se le pasa el objeto completo
        try {
            //Con ID
            $model = Tipos_Documento::find($id);
            $model->delete();
            return redirect()->route('tipos_documentos.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('tipos_documentos.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('tipos_documentos.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
