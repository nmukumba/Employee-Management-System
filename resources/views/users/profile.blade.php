@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      My Profile
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <a href="/changePassword" class="btn btn-primary">
              <i class="fa fa-edit"></i> Change Password
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
                    @if (Auth::user()->user_type_id == 1)
                      <h5 class="widget-user-desc">System Admin</h5>
                    @endif
                    @if (Auth::user()->user_type_id == 2)
                      <h5 class="widget-user-desc">HR Officer</h5>
                    @endif
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" src="/img/avatar5.png" alt="User Avatar">
                  </div>
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-6 border-right">
                        <div class="description-block">
                          <h5 class="description-header">Email</h5>
                          <span class="description-text">{{Auth::user()->email}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6">
                        <div class="description-block">
                          <h5 class="description-header">Phone</h5>
                          <span class="description-text">{{Auth::user()->phone}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.widget-user -->
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection