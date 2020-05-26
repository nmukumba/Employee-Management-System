@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Branch
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Branch</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/branch/{{ $branch[0]->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Branch name</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" 
                                           id="name"
                                           value="{{ old('name') ?? $branch[0]->name }}"
                                           placeholder="Enter branch name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company</label>
                                    <select class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="company_id" 
                                           id="company_id">
                                               <option>Select Company</option>
                                                 @foreach ($companies as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $selected_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                  @endforeach 
                                           </select>
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