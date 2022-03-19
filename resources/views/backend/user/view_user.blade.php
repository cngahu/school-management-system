@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">User List</h3>
                                <a href="{{route('user.add')}}" style="float:right;" class="btn btn-round btn-success mb-5">Add User</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                           <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th width="25%">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $users as $key => $cat )
                                        <tr>
                                            <td>{{$key +1}}</td>
                                            <td>{{$cat->name}}</td>
                                            <td>{{$cat->email}}</td>
                                            <td>{{$cat->usertype}}</td>
                                            <td>
                                                <a href="{{route('user.edit', $cat->id)}}"  class="btn btn-info">Edit</a>
                                                <a href="{{route('user.delete', $cat->id)}}"  id="delete" class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
