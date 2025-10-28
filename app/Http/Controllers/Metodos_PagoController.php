<?php

namespace App\Http\Controllers;
use App\Models\Metodos_Pago;

use Illuminate\Http\Request;

class Metodos_PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Metodos_Pago::all();

        return view('metodospago.index', compact('model'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadotiposdocumento(Request $request)
	{
		$model = Metodos_Pago::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
