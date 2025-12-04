<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida;
use App\Models\Registro;
use Carbon\Carbon;
use App\Http\Requests\SalidaRequest;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Salida::all();
        
        return view('salidas.index', compact('model'));
    }
    public function cambioestadosalida(Request $request)
	{
		$model = Salida::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $registro = Registro::where('estado', '=', 1)->get();
        return view('salidas.create', compact('registro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalidaRequest $request)
    {
        //
        $carbonDate = Carbon::now('UTC');
        $fecha = $carbonDate->format('Y-m-d H:i:s');
        $model = new Salida();
        $model->registros_id = $request->registro;
        $model->fecha_salida = $fecha;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();

		$modelRegistro = Registro::find($request->registro);
        if($modelRegistro){
            $modelRegistro->estado = '0';
            $modelRegistro->save();
        }
        return redirect()->route('salidas.index')->with('successMsg', 'El registro se creó exitosamente');
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
    public function edit(Salida $salida)
    {
        $registro = Registro::where('estado', '=', 1)->orderBy('id')->get();
        return view('salidas.edit',compact('salida','registro'));
    }

    public function update(SalidaRequest $request, Salida $salida)
    {
        $salida->update($request->all());
        return redirect()->route('salidas.index')->with('successMsg','El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $model = Salida::find($id);
            $model->delete();
            return redirect()->route('salidas.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('salidas.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('salidas.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
