@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add New Leave Application
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Leave Application</h3>
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
                        <form method="post" action="/leave" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="employee_id" value="{{$id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="leave_type_id">Leave Type</label>
                                    <select class="form-control {{ $errors->has('leave_type_id') ? ' is-invalid' : '' }}"
                                            name="leave_type_id"
                                            id="leave_type_id">
                                        <option>Select leave type</option>
                                         @foreach($types as $type)
                                            <option value="{{$type->id}}">{{ $type->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('leave_type_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('leave_type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right {{ $errors->has('start_date') ? ' is-invalid' : '' }}" 
                                                name="start_date" id="start_date" placeholder="Start date"
                                                value="{{ old('start_date')}}">
                                            </div>
                                            @if ($errors->has('start_date'))
                                                 <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right {{ $errors->has('end_date') ? ' is-invalid' : '' }}" 
                                                name="end_date" id="end_date" placeholder="End date"
                                                value="{{ old('end_date')}}">
                                            </div>
                                            @if ($errors->has('end_date'))
                                                 <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="number_of_days">Number of days</label>
                                    <input type="number"
                                           class="form-control {{ $errors->has('number_of_days') ? ' is-invalid' : '' }}"
                                           name="number_of_days" 
                                           id="number_of_days"
                                           value="{{ old('number_of_days')}}"
                                           placeholder="Enter number of days">
                                    @if ($errors->has('number_of_days'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number_of_days') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="document">Physical Leave Form</label>
                                    <input type="file"
                                           class="form-control-file {{ $errors->has('document') ? ' is-invalid' : '' }}"
                                           name="document"
                                           value="{{ old('document')}}"
                                           id="document">
                                    @if ($errors->has('document'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('document') }}</strong>
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