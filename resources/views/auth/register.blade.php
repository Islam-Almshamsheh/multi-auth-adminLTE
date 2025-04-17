@extends('layouts.app')

@section('title') Register @endsection

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('register') }}" class="h1"><b>Add</b>membership</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="input-group mb-3">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('name')
              <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
              <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
              <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password_confirmation')
              <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>

          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="{{ route('login') }}">I already have a membership</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
