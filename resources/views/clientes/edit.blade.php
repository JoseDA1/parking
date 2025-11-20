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
						<form method="POST" action="{{ route('clientes.update', $cliente) }}">
							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="nombre" autocomplete="off" value="{{ $cliente->nombre }}" required>
										</div>
									</div>
								</div>
								<div class="row">
									
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Documento <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="documento" autocomplete="off" value="{{ $cliente->documento }}" required>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										
										<div class="form-group label-floating">
											<label class="control-label">Tipo Documento <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="tipos_documentos" id="tipos_documentos" disabled>
												@foreach($tiposdocumento as $td)
													<option {{ $td->id == $cliente->tipos_documentos_id ? 'selected' : '' }} value="{{ $td->id }}">{{ $td->nombre }}</option>
												@endforeach
												
											</select>
											

										</div>
								</div>
								
								<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Email</label>
											<input type="text" class="form-control" name="email" autocomplete="off" value="{{ $cliente->email }}">
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Telefono <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="telefono" autocomplete="off" value="{{ $cliente->telefono }}">
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Direccion</label>
											<input type="text" class="form-control" name="direccion" autocomplete="off" value="{{ $cliente->direccion }}">
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
