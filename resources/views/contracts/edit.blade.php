@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Contract
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Contract</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="/contracts/{{$contract->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="employee_id" value="{{$contract->employee_id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="contract_type">Contract Type</label>
                                    <select class="form-control {{ $errors->has('contract_type') ? ' is-invalid' : '' }}"
                                            name="contract_type"
                                            id="contract_type">
                                        <option>Select contract type</option>
                                        @foreach ($types as $key => $value)
                                            <option value="{{ $key }}" {{ ( $key == $contract->contract_type) ? 'selected' : '' }}> {{ $value }} 
                                            </option>
                                        @endforeach 
                                    </select>
                                    @if ($errors->has('contract_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contract_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Contract Status</label>
                                    <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}"
                                            name="status"
                                            id="status">
                                        <option>Select contract status</option>
                                        @foreach ($status as $key => $value)
                                            <option value="{{ $key }}" {{ ( $key == $contract->status) ? 'selected' : '' }}> {{ $value }} 
                                            </option>
                                        @endforeach 
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right {{ $errors->has('start_date') ? ' is-invalid' : '' }}" 
                                                name="start_date" id="start_date"
                                                value="{{ old('start_date') ?? $contract->start_date }}"
                                                placeholder="Start date">
                                            </div>
                                            @if ($errors->has('start_date'))
                                                 <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right {{ $errors->has('end_date') ? ' is-invalid' : '' }}" 
                                                name="end_date" id="end_date" 
                                                value="{{ old('end_date') ?? $contract->end_date }}"
                                                placeholder="End date">
                                            </div>
                                            @if ($errors->has('end_date'))
                                                 <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company</label>
                                    <select class="form-control {{ $errors->has('company_id') ? ' is-invalid' : '' }}"
                                           name="company_id" 
                                           id="company_id">
                                               <option>Select Company</option>
                                                @foreach ($companies as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $contract->company_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                  @endforeach 
                                           </select>
                                    @if ($errors->has('company_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="branch_id">Branch</label>
                                    <select class="form-control {{ $errors->has('branch_id') ? ' is-invalid' : '' }}"
                                           name="branch_id" 
                                           id="branch_id">
                                               <option>Select Branch</option>
                                                @foreach ($branches as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $contract->branch_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                  @endforeach 
                                           </select>
                                    @if ($errors->has('branch_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('branch_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="department_id">Department</label>
                                    <select class="form-control {{ $errors->has('department_id') ? ' is-invalid' : '' }}"
                                           name="department_id" 
                                           id="department_id">
                                               <option>Select Department</option>
                                               @foreach ($departments as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $contract->department_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                  @endforeach 
                                           </select>
                                    @if ($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                                           name="role_id" 
                                           id="role_id">
                                               <option>Select Role</option>
                                                @foreach ($roles as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $contract->role_id) ? 'selected' : '' }}> 
                                                        {{ $value }} 
                                                    </option>
                                                  @endforeach 
                                           </select>
                                    @if ($errors->has('role_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div>
                                    <textarea class="textarea {{ $errors->has('job_description') ? ' is-invalid' : '' }}" 
                                            name="job_description"
                                            id="job_description"
                                            placeholder="Job Description"
                                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{ old('job_description') ?? $contract->job_description }}  
                                    </textarea>
                                    @if ($errors->has('job_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('job_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- <div class="form-group">
                                  <label>Job Description</label>
                                  <textarea class="form-control {{ $errors->has('job_description') ? ' is-invalid' : '' }}" 
                                    rows="5" 
                                    name="job_description"
                                    id="job_description"
                                    placeholder="Job description">
                                        {{ old('job_description') ?? $contract->job_description }}
                                    </textarea>
                                    @if ($errors->has('job_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('job_description') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                
                                <div class="form-group">
                                    <label for="document">Attache Contract</label>
                                    <input type="file"
                                           class="form-control-file {{ $errors->has('document') ? ' is-invalid' : '' }}"
                                           name="document"
                                           id="document">
                                    @if ($errors->has('document'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('document') }}</strong>
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