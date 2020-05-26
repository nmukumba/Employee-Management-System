@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add New Warning
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Warning</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/warnings" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="employee_id" value="{{$id}}">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
		                                    <label for="name">Name</label>
		                                    <input type="text"
		                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
		                                           name="name" 
		                                           id="name"
                                                   value="{{ old('name')}}"
		                                           placeholder="Enter name">
		                                    @if ($errors->has('name'))
		                                        <span class="invalid-feedback" role="alert">
		                                            <strong>{{ $errors->first('name') }}</strong>
		                                        </span>
		                                    @endif
		                                </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
		                                    <label for="document">Attach Report</label>
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
                                </div>
                           

                                <div>
                                    <textarea class="textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" 
                                            name="description"
                                            id="description"
                                            value="{{ old('description')}}"
                                            placeholder="Description"
                                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">   
                                    </textarea>
                                    @if ($errors->has('description'))
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
