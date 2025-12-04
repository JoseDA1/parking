<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Tipos_Vehiculo;
use Carbon\Carbon;
use App\Http\Requests\VehiculoRequest;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $model = Vehiculo::all();

        return view('vehiculos.index', compact('model'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadovehiculo(Request $request)
	{
		$model = Vehiculo::find($request->id);
		$model->estado=$request->estado;
		$model->save();
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $marca = Marca::where('estado', '=', 1)->orderBy('nombre')->get();
        $tipo_vehiculo = Tipos_Vehiculo::where('estado', '=', 1)->orderBy('nombre')->get();
        return view('vehiculos.create', compact('marca', 'tipo_vehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request)
    {
        //
        $image = $request->file('image');
        $slug = Str::slug($request->placa);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/vehiculos')){
                mkdir('uploads/vehiculos', 0777, true);
            }
            $image->move('uploads/vehiculos',$imageName);
        }else{
            $imageName = "";
        }
        $model = new Vehiculo();
        $model->placa = $request->placa;
        $model->modelo = $request->modelo;
        $model->marca_id = $request->marca;
        $model->tipos_vehiculos_id = $request->tipo_vehiculo;
        $model->estado = $request->estado;
        $model->registradoPor = $request->registradoPor;
        $model->image = $imageName;
        $model->save();
        return redirect()->route('vehiculos.index')->with('successMsg', 'El registro se creó exitosamente');

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
    public function edit(Vehiculo $vehiculo)
    {
        $tiposvehiculo = Tipos_Vehiculo::where('estado', '=', 1)->orderBy('id')->get();
        $marca = Marca::where('estado', '=', 1)->orderBy('id')->get();
        return view('vehiculos.edit',compact('vehiculo','tiposvehiculo', 'marca'));
    }

    public function update(VehiculoRequest $request, Vehiculo $vehiculo)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->placa);
        $data = $request->all();
        if (isset($image)) {
            if ($vehiculo->image) {
                $oldImagePath = public_path('uploads/vehiculos/' . $vehiculo->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $currentDate . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/vehiculos');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            $image->move($uploadPath, $imageName);
            $data['image'] = $imageName; 

        } else {
            unset($data['image']);
        }

        $vehiculo->update($data);

        return redirect()->route('vehiculos.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $ciudad->delete(); sin id, se le pasa el objeto completo
        try {
            //Con ID
            $model = Vehiculo::find($id);
            $model->delete();
            return redirect()->route('vehiculos.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('vehiculos.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('vehiculos.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
}
