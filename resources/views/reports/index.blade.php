@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Reports
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

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
    <div class="col-md-12">
      <!-- BAR CHART -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Employees by Branch</h3>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart">
            <canvas id="branches" style="height:300px"></canvas>
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
