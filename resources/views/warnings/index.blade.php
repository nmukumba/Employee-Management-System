@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Warning
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="/warnings/{{$warning->id}}/edit" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </div>  
                    <div class="box-body">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                              <i class="fa fa-text-width"></i>

                              <h3 class="box-title">{{$warning->name}}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" srcdoc="{{$warning->description}}"></iframe>
                                    </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
