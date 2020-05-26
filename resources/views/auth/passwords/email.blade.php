@extends('layouts.login')

@section('content')
<div class="login-box">
<div class="login-box-body">
<p class="login-box-msg">Reset Password</p>
@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<form method="POST" action="{{ route('password.email') }}">
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
  <div class="row">
    <!-- /.col -->
    <div class="col-xs-12">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
    </div>
    <!-- /.col -->
  </div>
</form>
<a href="/login">Go Back To Login</a><br>

</div>
<!-- /.login-box-body -->
</div>
@endsection
