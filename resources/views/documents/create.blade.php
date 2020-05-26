@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add New Document
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Document</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/documents" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="employee_id" value="{{$id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="document_type_id">Document Type</label>
                                    <select class="form-control {{ $errors->has('document_type_id') ? ' is-invalid' : '' }}"
                                            name="document_type_id"
                                            id="document_type_id">
                                        <option>Select document type</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{ $type->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('document_type_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('document_type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="document">Document</label>
                                    <input type="file"
                                           class="form-control-file {{ $errors->has('document') ? ' is-invalid' : '' }}"
                                           name="document"
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