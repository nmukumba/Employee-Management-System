@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Contract
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a href="/contract/{{$contract->id}}/edit" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Edit Contract
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fa fa-file-text-o margin-r-5"></i>Contract Type: </b>
                                {{$contract->contract_type}}
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-check-circle margin-r-5"></i>Status: </b>
                                {{$contract->status}}
                            <li class="list-group-item">
                                <b><i class="fa fa-calendar-o margin-r-5"></i>Start Date: </b>
                                {{$contract->start_date}}
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-calendar-minus-o margin-r-5"></i>End Date: </b>
                                {{$contract->end_date}}
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-industry margin-r-5"></i>Company: </b>
                                {{$contract->company}}
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-building-o margin-r-5"></i>Branch: </b>
                                {{$contract->branch}}
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-building margin-r-5"></i>Department: </b>
                                {{$contract->department}}
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-cogs margin-r-5"></i>Role: </b>
                                {{$contract->role}}
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-file-text margin-r-5"></i>Contract: </b>
                                <!-- <a href="/storage/{{$contract->document}}" class="btn btn-info btn-sm pdf" >View</a> -->
                                <a data-fancybox data-type="iframe" data-src="/storage/{{$contract->document}}" href="javascript:;" class="btn btn-info btn-sm" >View</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fa fa-list-ol margin-r-5"></i>Job Description</b>
                                <div class="embed-responsive embed-responsive-4by3">
                                  <iframe class="embed-responsive-item" srcdoc="{{$contract->job_description}}"></iframe>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
      </section>
      <!-- /.content -->
  </div>

<div id="dialog" style="display: none;">
    <div>
        <iframe id="frame"></iframe>
    </div>
</div>
  
@endsection
