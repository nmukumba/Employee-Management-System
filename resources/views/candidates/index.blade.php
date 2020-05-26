@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Candidates
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Candidates</h3>
                      <!-- <a href="{{ route('register') }}" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Add New
                      </a> -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="table" class="table table-bordered">
                        <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Name</th>
                              <th>Age</th>
                              <th>Gender</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>City</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($candidates as $candidate)
                          <tr>
                            <td>{{ $candidate->id }}</td>
                            <td>{{ $candidate->name }}</td>
                            <td>{{ $candidate->age }}</td>
                            <td>{{ $candidate->gender }}</td>
                            <td>{{ $candidate->email }}</td>
                            <td>{{ $candidate->phone }}</td>
                            <td>{{ $candidate->city }}</td>
                            <td>
                                <a href="/candidate/{{$candidate->id}}/view" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
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
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <form accept="/company/destroy" method="post">
                {{csrf_field()}}
              <div class="modal-body">
                <p>Are you sure you want to delete this company&hellip;</p>
                <input type="text" name="company_id" id="company_id" value="1">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
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