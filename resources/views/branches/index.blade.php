@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Branches
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Branches</h3>
                      <a href="/branch/create" class="btn btn-primary">
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
                              <th>Company</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($branches as $branch)
                          <tr>
                            <td>{{ $branch->id }}</td>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->company_name }}</td>
                            <td>
                                <a href="/branch/{{$branch->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-danger" data-company_id={{$branch->id}} data-toggle="modal" data-target="#delete" onclick="deleteBranch({{$branch->id}})"><i class="fa fa-trash"></i> Delete</button>
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
                <h4 class="modal-title">Delete Branch</h4>
              </div>
              <form accept="" method="post" id="deleteForm">
                {{csrf_field()}}

              <div class="modal-body">
                <p>Are you sure you want to delete this branch?</p>
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