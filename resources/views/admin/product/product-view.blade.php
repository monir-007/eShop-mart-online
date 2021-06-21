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
                                <li class="breadcrumb-item active" aria-current="page">Product list</li>
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
                            <h3 class="box-title">Product List</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name English</th>
                                        <th>Name Bangla</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($products as $item)
                                            <td><img src="{{ asset($item->product_thumbnail) }}"
                                                     style="width: 60px; height: 50px;"></td>
                                            <td>{{$item->name_eng}}</td>
                                            <td>{{$item->name_bng}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>
                                                <a href="{{route('product.edit',$item->id)}}"
                                                   class="btn btn-success btn-sm mr-1 "
                                                   data-toggle="tooltip"
                                                   data-placement="right" title="Edit"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ route('product.delete',$item->id) }}" id="delete"
                                                   class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                   data-placement="right" title="Remove"> <i class="fa fa-trash"></i>
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




