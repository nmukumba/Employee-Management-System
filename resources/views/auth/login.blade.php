@extends('layouts.login')

@section('content')
<div class="login-box">
<div class="login-logo">
  <img src="/img/logo2.png" class="img-responsive" style="margin: auto;">
  <b>HR</b> System
</div>
<!-- /.login-logo -->
<div class="login-box-body">
<p class="login-box-msg">Sign in to start your session</p>

<form method="POST" action="{{ route('login') }}">
    @csrf
  <div class="form-group has-feedback">
    <input id="email" type="email" class="form-control" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group has-feedback">
    <input id="password" type="password" class="form-control" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="row">
    <div class="col-xs-8">
      <!-- <div class="checkbox icheck">
        <label>
          <input type="checkbox"> Remember Me
        </label>
      </div> -->
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>
    <!-- /.col -->
  </div>
</form>

<a href="{{ route('password.request') }}">I forgot my password</a><br>

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
