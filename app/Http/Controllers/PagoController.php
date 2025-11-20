<?php

namespace App\Http\Controllers;
use App\Models\Pago;
use App\Models\Salida;
use App\Models\Metodos_Pago;
use App\Models\Cliente;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Pago::all();

        return view('pagos.index', compact('model'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadopago(Request $request)
	{
		$model = Pago::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $salidas = Salida::where('estado', '=', 1)->orderBy('id')->get();
        $metodospagos = Metodos_Pago::where('estado', '=', 1)->orderBy('nombre')->get();
        $cliente = Cliente::where('estado', '=', 1)->orderBy('nombre')->get();
        return view('pagos.create', compact('cliente','salidas','metodospagos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $model = new Pago();
        $model->valor_total = $request->valor_total;
        $model->salidas_id = $request->salida;
        $model->metodos_pago_id = $request->metodospagos;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->save();
        return redirect()->route('pagos.index')->with('successMsg', 'El registro se creó exitosamente');

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
            $model = Pago::find($id);
            $model->delete();
            return redirect()->route('pagos.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('pagos.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('pagos.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
    public function obtenerTotal(Request $request = null)
    {
        return response()->json(['total' => 2, 'debug' => $request->all()]);
    }
}
