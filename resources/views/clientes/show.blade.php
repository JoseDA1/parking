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
							<div class="card-body">
								<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;"></strong></label>
											<input type="text" class="form-control" name="nombre" autocomplete="off" value="{{ $cliente->nombre }}"  disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Documento <strong style="color:red;"></strong></label>
											<input type="text" class="form-control" name="documento" autocomplete="off" value="{{ $cliente->documento }}"  disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Tipo Documento <strong style="color:red;"></strong></label>
											<input tipe="text" class="form-control" name="documento" autocomplete="off" value="{{ $cliente->tipos_documentos->nombre }}" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Email</label>
											<input type="text" class="form-control" name="email" autocomplete="off" value="{{ $cliente->email }}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Telefono <strong style="color:red;"></strong></label>
											<input type="text" class="form-control" name="telefono" autocomplete="off" value="{{ $cliente->telefono }}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Direccion</label>
											<input type="text" class="form-control" name="direccion" autocomplete="off" value="{{ $cliente->direccion }}" disabled>
										</div>
									</div>
								</div>
								<!-- <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}"> -->
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('clientes.index') }}" class="btn border  btn-block btn-flat">Regresar</a>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
