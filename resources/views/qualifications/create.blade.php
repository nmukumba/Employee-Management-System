@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add New Qualification
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Qualification</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/qualifications" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="employee_id" value="{{$id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Qualification name</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           id="name"
                                           value="{{ old('name')}}"
                                           placeholder="Enter qualification name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="qualification_type_id">Qualification Type</label>
                                    <select class="form-control {{ $errors->has('qualification_type_id') ? ' is-invalid' : '' }}"
                                            name="qualification_type_id"
                                            id="qualification_type_id">
                                        <option>Select Qualification</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{ $type->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('qualification_type_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('qualification_type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="institution">Institution</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('institution') ? ' is-invalid' : '' }}"
                                           name="institution"
                                           id="institution"
                                           value="{{ old('institution')}}"
                                           placeholder="Enter institution">
                                    @if ($errors->has('institution'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('institution') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="year_attained">Year Attained</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('year_attained') ? ' is-invalid' : '' }}"
                                           name="year_attained"
                                           id="year_attained"
                                           value="{{ old('year_attained')}}"
                                           placeholder="Enter year attained">
                                    @if ($errors->has('year_attained'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('year_attained') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="document">Certificate</label>
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