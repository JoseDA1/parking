@extends('layouts.app')

@section('content')

<div class="card mt-2">
    <div class="card-header">
    <h3 class="card-title">Tarifas</h3>
    </div>
    <!-- /.card-TABLE-->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Registro</th>
                <th>Metodo de Pago</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($model as $md)
        <tr>
            <td>{{$md->id}}</td>
            <td>{{$md->registros_id}}</td>
            <td>{{$md->metodos_pago_id}}</td>
            <td>$ {{$md->valor_total}}</td>
            <td>
            <input data-type="pago" data-id="{{$md->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
            data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $md->estado ? 'checked':'' }}>
            </td>
                <td>
                    <form class="d-inline delete-form" action="{{ route('pagos.destroy', $md) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
    </div>
    <!-- /.card-TABLE -->
</div>

@endsection
