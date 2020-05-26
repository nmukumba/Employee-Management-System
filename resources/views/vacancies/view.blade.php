@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Vacancy
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Vacancies</h3>
            <a href="/vacancy/create" class="btn btn-primary">
              <i class="fa fa-plus-circle"></i> Add New
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <p>
                  <strong>Title:</strong> {{ $vacancy[0]->title }} <br>
                  <strong>Company:</strong> {{ $vacancy[0]->company_name }} <br>
                  <strong>Department:</strong> {{ $vacancy[0]->department_name }} <br>
                  <strong>Closing Date:</strong> {{ $vacancy[0]->closing_date }} <br>
                  <strong>Status:</strong> {{ $vacancy[0]->status }} <br>
                </p>
                <h3>Description</h3>
                <!-- <div class="embed-responsive embed-responsive-4by3">
                  <iframe class="embed-responsive-item" srcdoc="{{$vacancy[0]->description}}"></iframe>
                </div> -->
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Applicants</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Short Listed </a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="box box-primary">
                            <div class="box-header with-border">
                             
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="table" class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($applicants as $applicant)
                                  <tr>
                                    <td>{{ $applicant->id }}</td>
                                    <td>{{ $applicant->name }}</td>
                                    <td>{{ $applicant->email }}</td>
                                    <td>{{ $applicant->phone }}</td>
                                    <td>
                                      <a href="/candidates/{{$applicant->candidate_id}}/view" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                      <button class="btn btn-danger" data-company_id={{$user->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody></table>
                              </div>
                              <!-- /.box-body -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_2">

                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div>
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