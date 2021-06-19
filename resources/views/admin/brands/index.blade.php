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
                                <li class="breadcrumb-item active" aria-current="page">Brand list</li>
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
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                            <button class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#brandModalForm">Add Brand
                            </button>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Name Bangla</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($brands as $item)
                                            <td>{{$item->name_eng}}</td>
                                            <td>{{$item->name_bng}}</td>
                                            <td><img src="{{asset($item->image)}}" alt=""
                                                     style="width: 70px; height: 40px;"></td>
                                            <td>
                                                <a href="" class="btn btn-info">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
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

        <div class="modal fade " id="brandModalForm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h4 class="modal-title text-white" id="myLargeModalLabel">Add New Brand</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-11 ">
                            <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_eng" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Name Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_bng" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Upload Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="submit" class="btn btn-rounded btn-success float-right">Save changes</button>
                        <button type="button" class="btn btn-rounded btn-danger float-right" data-dismiss="modal">
                            Close
                        </button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- /.content-wrapper -->





@endsection
