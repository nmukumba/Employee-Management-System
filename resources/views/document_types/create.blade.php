@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Create New Document Type
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Document Type</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/document/types" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Document Type</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" 
                                           id="name"
                                           value="{{ old('name')}}"
                                           placeholder="Enter document type">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
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