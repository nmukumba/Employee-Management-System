@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <style type="text/css">
        .col-center-block {
            float: none;
            display: block;
            margin: 0 auto;
            /* margin-left: auto; margin-right: auto; */
        }
    </style>
    <section class="content-header">
        <h1>
            Create New Employee
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Employee</h3>
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
                    <form method="post" action="/employee" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text"
                                        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" 
                                        id="name"
                                        value="{{ old('name')}}"
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
                                         id="gender"
                                         value="{{ old('gender')}}">
                                         <option>Select Gender</option>
                                         <option value="Male">Male</option>
                                         <option value="Female">Female</option>
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
                                        name="dob" id="dob" placeholder="Date of Birth" value="{{ old('dob')}}">
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
                                     id="marital_status"
                                     value="{{ old('marital_status')}}">
                                     <option>Select Marital Status</option>
                                     <option value="Married">Married</option>
                                     <option value="Single">Single</option>
                                     <option value="Divorced">Divorced</option>
                                     <option value="Widowed">Widowed</option>
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
                                placeholder="Enter national id"
                                value="{{ old('national_id')}}">
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
                                placeholder="Enter nationality"
                                value="{{ old('nationality')}}">
                                @if ($errors->has('nationality'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nationality') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="leave_balance">Leave Balance</label>
                                <input type="number"
                                class="form-control {{ $errors->has('leave_balance') ? ' is-invalid' : '' }}"
                                name="leave_balance" 
                                id="leave_balance"
                                placeholder="Enter leave balance"
                                value="{{ old('leave_balance')}}">
                                @if ($errors->has('leave_balance'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('leave_balance') }}</strong>
                                </span>
                                @endif
                            </div>
                           <!--  <div class="form-group">
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
                            </div> -->
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="is_allowed_to_drive" value="1" 
                                value="{{ old('is_allowed_to_drive')}}"> Is Allowed to Drive
                            </label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="center-block" id="my_camera"></div>
                                <br/>
                                <button type="button" class="btn btn-primary center-block" onClick="take_snapshot()">
                                    <i class="fa fa-camera"></i> Take Snapshot</button>
                                    <input class="center-block" type="hidden" name="image" id="image" value="">
                                </div>
                                <div class="col-md-6">
                                    <div class="center-block" id="results">Your captured image will appear here...</div>
                                </div>
                            </div>
                        </div>
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