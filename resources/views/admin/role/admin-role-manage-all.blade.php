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
                                <li class="breadcrumb-item active" aria-current="page">Admin User list</li>
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
                            <h3 class="box-title">All Admin User List <span
                                    class="badge badge-pill badge-danger">{{count($adminUser)}}</span></h3>
                            <a href="{{route('add.new.admin')}}" class="btn btn-danger" style="float: right">Add New
                                Admin</a>
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
                                        <th>Access</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($adminUser as $user)
                                            <td><img src="{{asset($user->profile_photo_path)}}"
                                                     alt="" style="width: 50px;height: 50px"></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                @if($user->brand === 1)
                                                    <span class="badge badge-primary m-1">Brand</span>
                                                @else
                                                @endif
                                                @if($user->category === 1)
                                                    <span class="badge badge-info m-1">Category</span>
                                                @else
                                                @endif
                                                @if($user->product === 1)
                                                    <span class="badge badge-danger m-1">Product Manage</span>
                                                @else
                                                @endif
                                                @if($user->stock === 1)
                                                    <span class="badge badge-dark m-1">Stock</span>
                                                @else
                                                @endif
                                                @if($user->coupons === 1)
                                                    <span class="badge badge-warning m-1">Coupons</span>
                                                @else
                                                @endif
                                                @if($user->shipping === 1)
                                                    <span
                                                        class="badge badge-secondary text-dark m-1">Shipping Details</span>
                                                @else
                                                @endif
                                                @if($user->return_order === 1)
                                                    <span class="badge badge-light m-1">Orders Manage</span>
                                                @else
                                                @endif
                                                @if($user->product_review === 1)
                                                    <span class="badge badge-primary m-1">Product Review</span>
                                                @else
                                                @endif
                                                @if($user->reports === 1)
                                                    <span class="badge badge-success m-1">Reports Manage</span>
                                                @else
                                                @endif
                                                @if($user->blog === 1)
                                                    <span class="badge badge-warning m-1">Blog Post</span>
                                                @else
                                                @endif
                                                @if($user->allUser === 1)
                                                    <span class="badge badge-success m-1">All User List</span>
                                                @else
                                                @endif
                                                @if($user->slider === 1)
                                                    <span class="badge badge-info m-1">Home Slider</span>
                                                @else
                                                @endif
                                                @if($user->settings === 1)
                                                    <span class="badge badge-primary m-1">Site Settings</span>
                                                @else
                                                @endif
                                                @if($user->admin_user_role === 1)
                                                    <span class="badge badge-danger m-1">Admin User Role</span>
                                                @else
                                                @endif
                                            </td>

                                            <td class="d-flex">
                                                <a href="{{route('edit.admin.user',$user->id)}}"
                                                   class="btn btn-success mr-2 "
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Edit"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{route('delete.admin.user',$user->id)}}" id="delete"
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



