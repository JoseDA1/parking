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
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
									<div class="form-group label-floating">
										<label class="control-label">Numero de la Bahia <strong style="color:red;"></strong></label>
										<input type="text" class="form-control" name="numero_bahia" autocomplete="off" value="{{ $ }}" required>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control" name="estado" value="1">
							<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}">
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-2 col-xs-4">
									<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
								</div>
								<div class="col-lg-2 col-xs-4">
									<a href="{{ route('bahias.index') }}" class="btn border  btn-block btn-flat">Cancelar</a>
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
