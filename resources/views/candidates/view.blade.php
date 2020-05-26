@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Candidate Profile
            </h1>
            
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="/img/avatar5.png" alt="User profile picture">

                            <h3 class="profile-username text-center">{{ $candidate->name }}</h3>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                  <b>Gender:</b> {{ $candidate->gender }}
                                </li>
                                <li class="list-group-item">
                                    <b>Date of Birth:</b> {{ $candidate->dob }}
                                </li>
                                <li class="list-group-item">
                                    <b>Age:</b> {{ $candidate->age }}
                                </li>
                                <li class="list-group-item">
                                    <b>Email:</b> {{ $candidate->email }}
                                </li>
                                <li class="list-group-item">
                                    <b>Phone:</b> {{ $candidate->phone }}
                                </li>
                                <li class="list-group-item">
                                    <b>Address:</b> {{ $candidate->address }}
                                </li>
                                <li class="list-group-item">
                                    <b>City:</b> {{ $candidate->city }}
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTabs">
                            <li>
                                <a href="#qualifications" data-toggle="tab">
                                    <i class="fa fa-graduation-cap"></i> Qualifications
                                </a>
                            </li>
                            <li><a href="#experience" data-toggle="tab"><i class="fa fa-file-pdf-o"></i> Work Experience</a></li>
                            <li><a href="#applications" data-toggle="tab"><i class="fa fa-file-text"></i> Applications</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="qualifications">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="table" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Name</th>
                                                        <th>Institution</th>
                                                        <th>Year Attained</th>
                                                        <th>Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($qualifications as $qualification)
                                                        <tr>
                                                            <td>{{ $qualification->id }}</td>
                                                            <td>{{ $qualification->name }}</td>
                                                            <td>{{ $qualification->institution }}</td>
                                                            <td>{{ $qualification->year_attained }}</td>
                                                            <td>{{ $qualification->description }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="experience">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">

                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="documents" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Company</th>
                                                        <th>Position</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($experiences as $experience)
                                                        <tr>
                                                            <td>{{ $experience->id }}</td>
                                                            <td>{{ $experience->company }}</td>
                                                            <td>{{ $experience->position }}</td>
                                                            <td>{{ $experience->start_date }}</td>
                                                            <td>{{ $experience->end_date }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="applications">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="contracts" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Vacancy</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($applications as $application)
                                                        <tr>
                                                            <td>{{ $application->id }}</td>
                                                            <td>{{ $application->title }}</td>
                                                            <td>{{ $contract->status }}</td>>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
@endsection