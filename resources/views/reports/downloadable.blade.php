
@extends('layouts.admin')

@section('content')
<div class="content-wrapper" ng-app="app">
  <section class="content-header">
    <h1>
      Reports
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid" ng-controller="reportsController">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Reports</h3>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li ng-click="showBirthdayReports()"><a href="#"><i class="fa fa-birthday-cake"></i> Birthdays for this Month</a></li>
              <li ng-click="showWarningReports()"><a href="#"><i class="fa fa-warning"></i> Warning Reports</a></li>
              <li ng-click="showResignationReports()"><a href="#"><i class="fa fa-user-times"></i> Resignation Reports</a></li>
              <li ng-click="showRetirementReports()"><a href="#"><i class="fa fa-hourglass-end"></i> Employees About to Retire Report</a></li>
              <li ng-click="showContractsReports()"><a href="#"><i class="fa fa-calendar-times-o"></i> Contracts About to Expire Reports</a></li>
              <li ng-click="showContactTypesReports()"><a href="#"><i class="fa fa-filter"></i> Employees by Contract Types Reports</a></li>
              <li ng-click="showQualificationsReports()"><a href="#"><i class="fa fa-mortar-board"></i> Qualification Reports</a></li>
              <li ng-click="showDepartmentsReports()"><a href="#"><i class="fa fa-building-o"></i> Departments Reports</a></li>
              <li ng-click="showBranchesReports()"><a href="#"><i class="fa fa-building"></i> Branches Reports</a></li>
              <li ng-click="showDriversLicenseReport()"><a href="#"><i class="fa fa-credit-card"></i> Drivers License Reports</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><% title %></h3>

            <div class="box-tools pull-right">
              <form class="form-inline">
                <div class="form-group">
                  <select class="form-control"
                  ng-change="onCompanyChange()"
                  ng-model="company_id"
                  name="company_id" 
                  id="company_id">
                  <option value="">Select Company</option>
                  @foreach($companies as $company)
                  <option value="{{$company->id}}">{{ $company->name}}</option>
                  @endforeach
                </select>
              </div>
              <!-- <button type="button" class="btn btn-primary" id="button">View</button> -->
            </form>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row" ng-if="birthdayReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getBithdayReport()">View Report</button>
                  <div class="form-group">
                    <select class="form-control pull-right" ng-model="formData.month" style="width: 200px; margin-right: 5px;">
                      <option value="">Select Month</option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#birthdayTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="birthdayTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Date of Birth</th>
                      <th>Age</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="employee in birthdays">
                      <td><% $index+1 %></td>
                      <td><% employee.name %></td>
                      <td><% employee.dob %></td>
                      <td><% employee.age %></td>
                      <td><% employee.phone %></td>
                      <td><% employee.work_email %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="row" ng-if="warningReport">
            <div class="col-md-12"> Warning Reports

            </div>
          </div>
          <div class="row" ng-if="resignationReport">
            <div class="col-md-12"> Resignation Reports
            </div>
          </div>
          <div class="row" ng-if="retirementReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getRetirementReport()">View Report</button>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#retirementTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="retirementTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Date of Birth</th>
                      <th>Age</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="employee in retirements">
                      <td><% $index+1 %></td>
                      <td><% employee.name %></td>
                      <td><% employee.dob %></td>
                      <td><% employee.age %></td>
                      <td><% employee.phone %></td>
                      <td><% employee.work_email %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="row" ng-if="contractsReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getContractsReport()">View Report</button>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#contractsTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="contractsTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Contract Type</th>
                      <th>End Date</th>
                      <th>Days To Ending</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="employee in contracts">
                      <td><% $index+1 %></td>
                      <td><% employee.name %></td>
                      <td><% employee.role_name %></td>
                      <td><% employee.contract_type %></td>
                      <td><% employee.end_date %></td>
                      <td><% employee.days_to_end %></td>
                      <td><% employee.work_email %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="row" ng-if="qualificationReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getQualificationsReport()">View Report</button>
                   <form class="form-inline pull-right" style="margin-right: 5px;">
                      <div class="form-group">
                        <select class="form-control"
                        ng-model="formData.qualification_id"
                        name="qualification_id" 
                        id="qualification_id">
                        <option value="">Select Qualification Type</option>
                        @foreach($qualification_types as $type)
                        <option value="{{$type->id}}">{{ $type->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </form>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#qualificationsTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="qualificationsTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Qualification</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="employee in qualifications">
                      <td><% $index+1 %></td>
                      <td><% employee.name %></td>
                      <td><% employee.role_name %></td>
                      <td><% employee.qualification_type %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="row" ng-if="contactTypesReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getContractTypesReport()">View Report</button>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#contactTypeTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="contactTypeTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Contract Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="employee in contractTypes">
                      <td><% $index+1 %></td>
                      <td><% employee.name %></td>
                      <td><% employee.role_name %></td>
                      <td><% employee.contract_type %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="row" ng-if="departmentsReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getDepartmentsReport()">View Report</button>
                   <form class="form-inline pull-right" style="margin-right: 5px;">
                      <div class="form-group">
                        <select class="form-control"
                        ng-model="formData.department_id"
                        name="department_id" 
                        id="department_id">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{ $department->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </form>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#departmentsTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="departmentsTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Department Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="department in departments">
                      <td><% $index+1 %></td>
                      <td><% department.name %></td>
                      <td><% department.role_name %></td>
                      <td><% department.department_name %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="row" ng-if="branchesReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getBranchesReport()">View Report</button>
                   <form class="form-inline pull-right" style="margin-right: 5px;">
                      <div class="form-group">
                        <select class="form-control"
                        ng-model="formData.branch_id"
                        name="branch_id" 
                        id="branch_id"
                        ng-options="item.id as item.name for item in companyBranches">
                        <option value="">Select Branch</option>
                      </select>
                    </div>
                  </form>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#branchesTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="branchesTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Branch Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="branch in branches">
                      <td><% $index+1 %></td>
                      <td><% branch.name %></td>
                      <td><% branch.role_name %></td>
                      <td><% branch.branch_name %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="row" ng-if="driversLicenseReport">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary pull-right" ng-click="getLicenseReport()">View Report</button>
                  <button class="btn btn-primary pull-left" ng-click="exportToExcel('#licenseTable')">
                    <i class="fa fa-download"></i> Export to Excel</button>
                  </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                  <div class="col-md-12">
                   <table class="table table-bordered bordered table-striped table-condensed dataTable"
                   id="licenseTable">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Company</th>
                      <th>Department</th>
                      <th>Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="license in licenses">
                      <td><% $index+1 %></td>
                      <td><% license.name %></td>
                      <td><% license.company_name %></td>
                      <td><% license.department_name %></td>
                      <td><% license.role_name %></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
        </div>
      <!-- /.box-body -->
      <div class="box-footer no-padding">

      </div>
    </div>
    <!-- /. box -->
  </div>
  <!-- /.col -->
</div> 
</section>
<!-- /.content -->
</div>
@endsection
