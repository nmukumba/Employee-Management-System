@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Employee Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                @if ($employee->is_deleted == 0)
                    <li><a href="/employees"><i class="fa fa-user"></i> Current Employees</a></li>
                @endif
                @if ($employee->is_deleted == 1)
                    <li><a href="/ex/employees"><i class="fa fa-user-times"></i> Ex-Employees</a></li>
                @endif
                <li class="active">Employee Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{$employee->image ? '/' . $employee->image : '/img/avatar5.png'}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{ $employee->name }}</h3>

                            <p class="text-muted text-center">{{$position}}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                  <b>Gender:</b> {{ $employee->gender }}
                                </li>
                                <li class="list-group-item">
                                    <b>Date of Birth:</b> {{ $employee->dob }}
                                </li>
                                <li class="list-group-item">
                                    <b>Marital Status:</b> {{ $employee->marital_status }}
                                </li>
                                <li class="list-group-item">
                                    <b>National ID:</b> {{ $employee->national_id }}
                                </li>
                                <li class="list-group-item">
                                    <b>Nationality:</b> {{ $employee->nationality }}
                                </li>
                                <li class="list-group-item">
                                    <b>Leave Balance:</b> {{ $employee->leave_balance }}
                                </li>
                                <li class="list-group-item">
                                    <b>Is Allowed to Drive:</b> {{ $employee->is_allowed_to_drive ? 'Yes' : 'No' }}
                                </li>
                            </ul>

                            <a href="/employee/{{ $employee->id}}/edit" class="btn btn-primary btn-block">
                                <i class="fa fa-edit"></i>
                                <b> Edit</b>
                            </a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTabs">
                            <li class="active">
                                <a href="#contact-details" data-toggle="tab">
                                    <i class="fa fa-phone-square"></i> Contact Details
                                </a>
                            </li>
                            <li>
                                <a href="#qualifications" data-toggle="tab">
                                    <i class="fa fa-graduation-cap"></i> Qualifications
                                </a>
                            </li>
                            <li><a href="#documents" data-toggle="tab"><i class="fa fa-file-pdf-o"></i> Documents</a></li>
                            <li><a href="#contracts" data-toggle="tab"><i class="fa fa-file-text"></i> Contracts</a></li>
                            <li><a href="#leave" data-toggle="tab"><i class="fa fa-calendar-minus-o"></i> Leave</a></li>
                            <li><a href="#work-tools" data-toggle="tab"><i class="fa  fa-wrench"></i> Work Tools</a></li>
                            <li><a href="#warnings" data-toggle="tab"><i class="fa fa-warning"></i> Warnings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="contact-details">
                                <a href="/contact_details/{{$employee->id}}/edit" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                    <b> Edit Details</b></a>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                              <b><i class="fa fa-phone-square margin-r-5"></i>Phone Number 1:</b>
                                                {{ $contact_details[0]->phone}}
                                            </li>
                                            <li class="list-group-item">
                                              <b><i class="fa fa-phone-square margin-r-5"></i>Phone Number 2:</b>
                                                {{ $contact_details[0]->phone_2}}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-envelope margin-r-5"></i> Personal Email: </b>
                                                {{ $contact_details[0]->personal_email}}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-envelope margin-r-5"></i> Work Email: </b>
                                {{ $contact_details[0]->work_email}}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-map-marker margin-r-5"></i> Postal Address:</b>
                                {{ $contact_details[0]->postal_address}}
                                             <li class="list-group-item">
                                                <b><i class="fa fa-map-marker margin-r-5"></i> Physical Address:</b>
                                {{ $contact_details[0]->physical_address}}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-user margin-r-5"></i> Next of Kin:</b>
                                {{ $contact_details[0]->next_of_kin}}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-phone-square margin-r-5"></i> Next of Kin Relationship:</b>
                                {{ $contact_details[0]->next_of_kin_relationship }}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-phone-square margin-r-5"></i> Next of Kin Phone Number:</b>
                                {{ $contact_details[0]->next_of_kin_phone}}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-envelope margin-r-5"></i> Next of Kin Email:</b>
                                {{ $contact_details[0]->next_of_kin_email}}
                                            </li>
                                            <li class="list-group-item">
                                                <b><i class="fa fa-map-marker margin-r-5"></i> Next of Kin Address:</b>
                                {{ $contact_details[0]->next_of_kin_address}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="qualifications">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <a href="/qualifications/create/{{$employee->id}}" class="btn btn-primary">
                                                    <i class="fa fa-plus-circle"></i> Add New
                                                </a>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="table" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Name</th>
                                                        <th>Qualification Type</th>
                                                        <th>Institution</th>
                                                        <th>Year Attained</th>
                                                        <th>Certificate</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($qualifications as $qualification)
                                                        <tr>
                                                            <td>{{ $qualification->id }}</td>
                                                            <td>{{ $qualification->name }}</td>
                                                            <td>{{ $qualification->qualification_name }}</td>
                                                            <td>{{ $qualification->institution }}</td>
                                                            <td>{{ $qualification->year_attained }}</td>
                                                            <td>
                                                                <a data-fancybox data-type="iframe" data-src="/storage/{{$qualification->document}}" href="javascript:;">
                                                                    <i class="fa fa-book"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="/qualification/{{$qualification->id}}/edit"
                                                                   class="btn btn-success">Edit</a>
                                                            </td>
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

                            <div class="tab-pane" id="documents">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <a href="/documents/create/{{$employee->id}}" class="btn btn-primary">
                                                    <i class="fa fa-plus-circle"></i> Add New
                                                </a>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="documents" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Document Type</th>
                                                        <th>Document</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($documents as $document)
                                                        <tr>
                                                            <td>{{ $document->id }}</td>
                                                            <td>{{ $document->name }}</td>
                                                            <td>
                                                                <a data-fancybox data-type="iframe" data-src="/storage/{{$document->document}}" href="javascript:;">
                                                                    <i class="fa fa-file-pdf-o"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="/document/{{$document->id}}/edit"
                                                                   class="btn btn-success">Edit</a>
                                                            </td>
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
                            <div class="tab-pane" id="contracts">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <a href="/contract/create/{{$employee->id}}" class="btn btn-primary">
                                                    <i class="fa fa-plus-circle"></i> Add New
                                                </a>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="contracts" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Contract Type</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($contracts as $contract)
                                                        <tr>
                                                            <td>{{ $contract->id }}</td>
                                                            <td>{{ $contract->contract_type }}</td>
                                                            <td>{{ $contract->start_date }}</td>
                                                            <td>{{ $contract->end_date }}</td>
                                                            <td>{{ $contract->role }}</td>
                                                            <td>{{ $contract->status }}</td>
                                                            <td>
                                                                <a href="/contract/{{$contract->id}}/view"
                                                                   class="btn btn-info">View</a>
                                                            </td>
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
                            <div class="tab-pane" id="leave">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Leave Balance: <b>{{$employee->leave_balance}}</b></h3>
                                                <a href="/leave/create/{{$employee->id}}" class="btn btn-primary pull-right">
                                                    <i class="fa fa-plus-circle"></i> Add New
                                                </a>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Leave Type</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Number of Days</th>
                                                        <th>Leave Form</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($leave_history as $leave)
                                                        <tr>
                                                            <td>{{ $leave->id }}</td>
                                                            <td>{{ $leave->name }}</td>
                                                            <td>{{ $leave->start_date }}</td>
                                                            <td>{{ $leave->end_date }}</td>
                                                            <td>{{ $leave->number_of_days }}</td>
                                                            <td>
                                                                <a data-fancybox data-type="iframe" data-src="/storage/{{$leave->document}}" href="javascript:;">
                                                                    <i class="fa fa-file-pdf-o"></i>
                                                                </a>
                                                            </td>
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
                            <div class="tab-pane" id="warnings">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <a href="/warnings/create/{{$employee->id}}" class="btn btn-primary">
                                                    <i class="fa fa-plus-circle"></i> Add New
                                                </a>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Name</th>
                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($warnings as $warning)
                                                        <tr>
                                                            <td>{{ $warning->id }}</td>
                                                            <td>{{ $warning->name }}</td>
                                                            <td>
                                                                <a href="/warnings/{{$warning->id}}/view"
                                                                   class="btn btn-info">View</a>
                                                            </td>
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
                            <div class="tab-pane" id="work-tools">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <a href="/tools/create/{{$employee->id}}" class="btn btn-primary">
                                                    <i class="fa fa-plus-circle"></i> Add New
                                                </a>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="documents" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Name</th>
                                                        <th>Model</th>
                                                        <th>Condition</th>
                                                        <th>Serial Number</th>
                                                        <th>Date Issued</th>
                                                        <th>Date Returned</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($tools as $tool)
                                                        <tr>
                                                            <td>{{ $tool->id }}</td>
                                                            <td>{{ $tool->name }}</td>
                                                            <td>{{ $tool->model }}</td>
                                                            <td>{{ $tool->condition }}</td>
                                                            <td>{{ $tool->serial_number }}</td>
                                                            <td>{{ $tool->date_issued }}</td>
                                                            <td>{{ $tool->date_returned }}</td>
                                                            <td>{{ $tool->status }}</td>
                                                            <td>
                                                                <a href="/tools/{{$tool->id}}/edit"
                                                                   class="btn btn-success">Edit</a>
                                                            </td>
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