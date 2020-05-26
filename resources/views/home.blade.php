@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$current_employees}}</h3>

            <p>Current Employees</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
          <a href="/employees" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$companies}}</h3>

            <p>Companies</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-home"></i>
          </div>
          <a href="/companies" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$users}}</h3>

            <p>Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-people"></i>
          </div>
          <a href="/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$ex_employees}}</h3>

            <p>Ex-Employees</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="/ex/employees" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Current Employees per Company</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-9">
                <p class="text-center">
                  <strong>Current Employees per Company</strong>
                </p>

                <div class="chart">
                  <!-- Sales Chart Canvas -->
                  <div class="chart">
                    <canvas id="barChart" style="height:300px"></canvas>
                  </div>
                  
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-3">
                <ul class="list-group list-group-unbordered">
                  @foreach($data as $company)
                  <li class="list-group-item">
                    <a href="/reports?id={{ $company->id }}">
                      <b>{{ $company->name }}</b><i class="fa fa-chevron-right pull-right"></i>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Employees per Department</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <p class="text-center">
                  <strong>Employees per Department</strong>
                </p>

                <div class="chart">
                  <!-- Sales Chart Canvas -->
                    <canvas id="departments" style="height:300px"></canvas>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-8">
        <!-- BAR CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Employees by Age</h3>
          </div>
          <div class="box-body chart-responsive">
            <div class="chart">
              <canvas id="age" style="height:300px"></canvas>
            </div>
            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-md-4">
        <!-- BAR CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Employees by Gender</h3>
          </div>
          <div class="box-body chart-responsive">
            <!-- <div class="chart" id="gender" style="height: 300px; position: relative;"></div> -->
            <div class="chart">
              <canvas id="gender" style="height:300px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <!-- BAR CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Employees per Role</h3>
          </div>
          <div class="box-body chart-responsive">
            <div class="chart">
              <canvas id="roles" style="height:300px"></canvas>
            </div>
            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-md-4">
        <!-- BAR CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Employees by Contact Type</h3>
          </div>
          <div class="box-body chart-responsive">
            <!-- <div class="chart" id="contracts" style="height: 300px; position: relative;"></div> -->
            <div class="chart">
              <canvas id="contracts" style="height:300px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
@endsection
