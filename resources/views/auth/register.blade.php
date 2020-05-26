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
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add User</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" 
                                id="name"
                                placeholder="Enter name">
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
                                placeholder="Enter phone">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="user_type">User Type</label>
                                <select class="form-control {{ $errors->has('user_type_id') ? ' is-invalid' : '' }}" name="user_type_id" id="user_type_id">
                                    <option>Select user type</option>
                                    @foreach($user_types as $user_type)
                                        <option value="{{$user_type->id}}">{{ $user_type->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_type_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_type_id') }}</strong>
                                </span>
                                @endif
                            </div>

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
                                class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                name="password_confirmation" 
                                id="password_confirmation"
                                placeholder="Enter confirm password">
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
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
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
