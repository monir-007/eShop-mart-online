@extends('admin.layouts.app')
@section('admin-index')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.profile')}}"><i
                                            class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bt-3 border-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">All User List <span
                                    class="badge badge-pill badge-danger">{{count($users)}}</span></h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($users as $user)
                                            <td><img
                                                    src="{{(!empty($user->profile_photo_path))?url('images/upload/users/'.$user->profile_photo_path):url('images/upload/no_image.jpg')}}"
                                                    alt=""
                                                    style="width: 60px; height: 50px;"></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                @if($user->UserOnline())
                                                    <span class="badge badge-pill badge-success">Active Now</span>
                                                @else
                                                    <span
                                                        class="badge badge-pill badge-warning">{{\Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</span>
                                                @endif
                                            </td>

                                            <td class="d-flex">
                                                <a class="btn btn-success mr-2 "
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Edit"> <i class="fa fa-edit"></i> </a>
                                                <a id="delete"
                                                   class="btn btn-danger" data-toggle="tooltip"
                                                   data-placement="bottom" title="Remove"> <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



