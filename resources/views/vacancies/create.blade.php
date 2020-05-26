@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Create New Vacancy
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Vacancy</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/vacancy" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           name="title" 
                                           id="title"
                                           placeholder="Enter title">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company</label>
                                    <select class="form-control {{ $errors->has('company_id') ? ' is-invalid' : '' }}"
                                           name="company_id" 
                                           id="company_id">
                                               <option>Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{ $company->name}}</option>
                                                @endforeach
                                           </select>
                                    @if ($errors->has('company_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="department_id">Department</label>
                                    <select class="form-control {{ $errors->has('department_id') ? ' is-invalid' : '' }}"
                                           name="department_id" 
                                           id="department_id">
                                               <option>Select Department</option>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{ $department->name}}</option>
                                                @endforeach
                                           </select>
                                    @if ($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Closing Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right {{ $errors->has('closing_date') ? ' is-invalid' : '' }}" 
                                        name="closing_date" id="closing_date" placeholder="Closing Date">
                                    </div>
                                    @if ($errors->has('closing_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('closing_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}"
                                           name="status" 
                                           id="status">
                                               <option>Select Status</option>
                                                @foreach($statuses as $key => $value)
                                                    <option value="{{$key}}">{{ $value}}</option>
                                                @endforeach
                                           </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <textarea class="textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" 
                                            name="description"
                                            id="description"
                                            placeholder="Job Description"
                                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">   
                                    </textarea>
                                    @if ($errors->has('job_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
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