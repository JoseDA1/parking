@extends ('layouts.app')

@section ('content')
<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('tiposvehiculos.update', $tiposvehiculo) }}">
							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="nombre" autocomplete="off" value="{{ $tiposvehiculo->nombre }}" required>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										
										<div class="form-group label-floating">
											<label class="control-label">Tarifa <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="tarifas_id" id="tarifas_id">
												@foreach($tarifa as $tf)
													<option {{ $tf->id == $tiposvehiculo->tarifas_id ? 'selected' : '' }} value="{{ $tf->id }}">{{ $tf->id }}</option>
												@endforeach
												
											</select>
											

										</div>
								</div>
								
								<input type="hidden" class="form-control" name="estado" value="{{ $tiposvehiculo->estado }}">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ $tiposvehiculo->registradoPor }}">
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('clientes.index') }}" class="btn border  btn-block btn-flat">Cancelar</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
