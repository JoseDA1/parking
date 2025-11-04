@extends('layouts.app')

@section('content')
<section class="content">
    @include('layouts.msg')
</section>
<div class="card mt-2">
    <div class="card-header">
        <a href="{{ route('tarifas.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
        
    <h3 class="card-title">Tarifas</h3>
    </div>
    <!-- /.card-TABLE-->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Valor Hora</th>
                <th>Valor Parcial</th>
                <th>Valor Dia</th>
                <th>Valor Mes</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($tarifas as $tarifa)
        <tr>
            <td>{{$tarifa->id}}</td>
            <td>$ {{$tarifa->valor_hora}}</td>
            <td>$ {{$tarifa->valor_parcial}}</td>
            <td>$ {{$tarifa->valor_dia}}</td>
            <td>$ {{$tarifa->valor_mensuales}}</td>
            <!-- Cambiar cod del whatsapp -->
            <td>
            <input data-type="tarifa" data-id="{{$tarifa->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
            data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $tarifa->estado ? 'checked':'' }}>
            </td>
            <td>
                <form class="d-inline delete-form" action="{{ route('tarifas.destroy', $tarifa) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
    </div>
    <!-- /.card-TABLE -->
</div>

@endsection
