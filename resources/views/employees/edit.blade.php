@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Employee Details
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Employee</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="/employee/{{ $employee->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" 
                                id="name"
                                value="{{ old('name') ?? $employee->name }}"
                                placeholder="Enter employee name">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                 name="gender"
                                 id="gender">
                                     <option>Select Gender</option>
                                        @foreach ($gender as $key => $value)
                                            <option value="{{ $key }}" {{ ($key == $employee->gender) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                        @endforeach 
                                 </select>
                                 @if ($errors->has('gender'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right {{ $errors->has('dob') ? ' is-invalid' : '' }}" 
                                    name="dob" id="dob" value="{{ old('dob') ?? $employee->dob }}" placeholder="Date of Birth">
                                </div>
                                @if ($errors->has('dob'))
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="marital_status">Marital Status</label>
                                <select class="form-control {{ $errors->has('marital_status') ? ' is-invalid' : '' }}"
                                 name="marital_status" 
                                 id="marital_status">
                                    <option>Select Marital Status</option>
                                    @foreach ($status as $key => $value)
                                        <option value="{{ $key }}" {{ ($key == $employee->marital_status) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                        </option>
                                    @endforeach 
                                 </select>
                                 @if ($errors->has('marital_status'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('marital_status') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="national_id">National ID</label>
                                <input type="text"
                                class="form-control {{ $errors->has('national_id') ? ' is-invalid' : '' }}"
                                name="national_id" 
                                id="national_id"
                                value="{{ old('national_id') ?? $employee->national_id }}"
                                placeholder="Enter national id">
                                @if ($errors->has('national_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('national_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input type="text"
                                class="form-control {{ $errors->has('nationality') ? ' is-invalid' : '' }}"
                                name="nationality" 
                                id="nationality"
                                value="{{ old('Nationality') ?? $employee->nationality }}"
                                placeholder="Enter nationality">
                                @if ($errors->has('nationality'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nationality') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file"
                                       class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                       name="image"
                                       id="image">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" 
                                name="is_allowed_to_drive" 
                                value="1" 
                                {{ $employee->is_allowed_to_drive ? 'checked' : '' }}> Is Allowed to Drive
                              </label>
                            </div>
                    </div>

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