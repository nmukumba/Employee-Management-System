@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create New User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit User</h3>
                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="/users/{{$user->id}}">
                        @csrf
                        @method('PATCH')
                    <input type="hidden" value="{{$user->id}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name"
                                id="name"
                                value="{{$user->name}}"
                                placeholder="Enter company name">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email"
                                id="email"
                                value="{{$user->email}}"
                                placeholder="Enter email">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text"
                                class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                name="phone"
                                id="phone"
                                value="{{$user->phone}}"
                                placeholder="Enter phone">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="user_type">User Type</label>
                                <select class="form-control {{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="user_type" id="user_type">
                                    <option>Select user type</option>
                                    @foreach ($types as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == $user->user_type_id) ? 'selected' : '' }}>
                                                        {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reset Password</h3>
                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="/resetPassword">
                        @csrf
                        <input type="hidden" value="{{$user->id}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"
                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password"
                                id="password"
                                placeholder="Enter password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm password</label>
                                <input type="password"
                                class="form-control"
                                name="password_confirmation"
                                id="password_confirmation"
                                placeholder="Enter confirm password">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
