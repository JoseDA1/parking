@extends('layouts.appLogin')

@section('title', 'Register')

@section('content')
<div class="background w-100 h-100 bg-dark position-absolute opacity-100"></div>

<div class="register-box">
  <div class="card card-outline card-info">
    <div class="card-header text-center">
        <img src="{{ asset('logo/logo-parking.png') }}" alt="" style="width:124px">
    </div>
    <div class="card-body">
        
        <p class="login-box-msg fw-bolder">{{ __('Log Up') }}</p>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre Completo">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
            
                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>
            <div class="input-group mb-3">
                <input placeholder="Contraseña"id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input placeholder="Repetir Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-info ">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-4 mt-2">
                <div class="col-12">
                    <button type="submit" class="btn btn-info text-white col fw-bold ">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>

      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->
      <div class="col text-center ">
          <p class="mb-1 btn border text-center">
              <a href="{{ route('login') }}" class="text-decoration-none text-reset color-none">I already have a membership</a>
          </p>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection
