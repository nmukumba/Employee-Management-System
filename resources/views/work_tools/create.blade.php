@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Create New Tool
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Tool</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/tools" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="employee_id" value="{{$id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Tool name</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" 
                                           id="name"
                                           value="{{ old('name')}}"
                                           placeholder="Enter tool name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('model') ? ' is-invalid' : '' }}"
                                           name="model" 
                                           id="model"
                                           value="{{ old('model')}}"
                                           placeholder="Enter model">
                                    @if ($errors->has('model'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="condition">Condition</label>
                                    <select class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="condition" 
                                           id="condition">
                                                <option>Select Condition</option>
                                                <option value="New">New</option>
                                                <option value="Preused">Preused</option>
                                           </select>
                                    @if ($errors->has('condition'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('condition') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="serial_number">Serial Number</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('serial_number') ? ' is-invalid' : '' }}"
                                           name="serial_number" 
                                           id="serial_number"
                                           value="{{ old('serial_number')}}"
                                           placeholder="Enter serial number">
                                    @if ($errors->has('serial_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('serial_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                 <div class="form-group">
                                    <label>Date Issued</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right {{ $errors->has('date_issued') ? ' is-invalid' : '' }}" 
                                        name="date_issued" id="date_issued" placeholder="Date Issued"
                                        value="{{ old('date_issued')}}">
                                    </div>
                                    @if ($errors->has('date_issued'))
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_issued') }}</strong>
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