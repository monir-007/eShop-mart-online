@extends('admin.layouts.app')
@section('style')

@endsection
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
                                <li class="breadcrumb-item active" aria-current="page">Pending Review list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Pending Review list</h3>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Summary</th>
                                            <th>Comment</th>
                                            <th>User</th>
                                            <th>Product</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-transparent">
                                            @foreach($review as $item)
                                                <td>{{$item->summary}}</td>
                                                <td>{{$item->comment}}</td>
                                                <td>{{$item->user->name}}</td>
                                                <td>{{$item->product->name_eng}}</td>
                                                <td>
                                                    @if($item->status === 0)
                                                        <span
                                                            class="badge badge-pill badge-warning">Pending</span>
                                                    @elseif($item->status === 1)
                                                        <span
                                                            class="badge badge-pill badge-success">Publish</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{route('product.review.approve',$item->id)}}"
                                                       class="btn btn-danger mr-2"
                                                       id="approveReview"
                                                       data-toggle="tooltip"
                                                       data-placement="bottom" title="Approve Review"> <i
                                                            class="fa fa-check-square-o"></i> </a>
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
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection



