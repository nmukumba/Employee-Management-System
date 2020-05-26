@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Leave Types
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Leave Types</h3>
                      <a href="/leave/types/create" class="btn btn-primary">
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
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($leave_types as $leave_type)
                          <tr>
                            <td>{{ $leave_type->id }}</td>
                            <td>{{ $leave_type->name }}</td>
                            <td>
                                <a href="/leave/types/{{$leave_type->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-danger" data-company_id={{$leave_type->id}} data-toggle="modal" data-target="#delete" onclick="deleteLeaveType({{$leave_type->id}})"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="delete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Leave Type</h4>
              </div>
              <form accept="" method="post" id="deleteForm">
                {{csrf_field()}}

              <div class="modal-body">
                <p>Are you sure you want to delete this leave type?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline" data-dismiss="modal" onclick="formSubmit()">Delete</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>
<!-- /.content -->
</div>
@endsection