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
						<form method="POST" action="{{ route('vehiculos.store') }} " enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Placa <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="placa" autocomplete="off" value="{{ old('placa') }}" required>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Modelo <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="modelo" autocomplete="off" value="{{ old('modelo') }}" required>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Marca <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="marca" autocomplete="off" value="{{ old('marca') }}" required>
												@foreach($marca as $mc)
													<option value="{{ $mc->id }}">{{ $mc->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Tipo Vehiculo <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="tipo_vehiculo" autocomplete="off" value="{{ old('tipo_vehiculo') }}" required>
												@foreach($tipo_vehiculo as $tv)
													<option value="{{ $tv->id }}">{{ $tv->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Imagen <strong style="color:red;">(*)</strong></label>
											<input type="file" class="form-control" name="image" autocomplete="off" value="{{ old('image') }}" multiple accept="image/*">
											
										</div>
									</div>
								</div>
								<!-- <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}"> -->
							</div>
							<input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}">
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('vehiculos.index') }}" class="btn border  btn-block btn-flat">Cancelar</a>
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
