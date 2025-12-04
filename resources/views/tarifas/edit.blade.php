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
						<form method="POST" action="{{ route('tarifas.update', $tarifa) }}">
							@csrf
							@method('PUT')

							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Valor Hora <strong style="color:red;">(*)</strong></label>
											<input type="number" class="form-control" name="valor_hora" autocomplete="off" value="{{$tarifa->valor_hora}}" required>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Valor Parcial <strong style="color:red;">(*)</strong></label>
											<input type="number" class="form-control" name="valor_parcial" autocomplete="off" value="{{$tarifa->valor_parcial}}" required>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Valor Dia <strong style="color:red;">(*)</strong></label>
											<input type="number" class="form-control" name="valor_dia" autocomplete="off" value="{{$tarifa->valor_dia}}" required>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Valor Mensual <strong style="color:red;">(*)</strong></label>
											<input type="number" class="form-control" name="valor_mensuales" autocomplete="off" value="{{$tarifa->valor_mensuales}}" required>
										</div>
									</div>
									
								</div>
								<!-- <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}"> -->
							</div>
								<input type="hidden" class="form-control" name="estado" value="{{ $tarifa->estado }}">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ $tarifa->registradoPor }}">
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('tarifas.index') }}" class="btn border  btn-block btn-flat">Cancelar</a>
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
