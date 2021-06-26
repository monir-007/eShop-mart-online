@extends('admin.layouts.app')
@section('style')
    <link href="{{asset('assets/vendor_components/bootstrap/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/vendor_components/bootstrap-datepicker/1.3.0/css/datepicker.css')}}" rel="stylesheet"
          type="text/css"/>
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
                                <li class="breadcrumb-item active" aria-current="page">Category list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box bt-3 border-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category List</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Discount</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($coupons as $item)
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->discount}}%</td>
                                            <td>{{$item->validity}}</td>
                                            <td>
                                                @if($item->status === 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Deactivated</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{route('category.edit',$item->id)}}"
                                                   class="btn btn-success mr-2"
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Edit"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ route('category.delete',$item->id) }}" id="delete"
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

                <!-- =============== Add New Brand ================== -->
                <div class="col-4">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Add New Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('category.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" class="form-control">
                                            @error('discount')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Validity <span class="text-danger">*</span></h5>
                                        <div id="datepicker" class="input-group date controls"
                                             data-date-format="mm-dd-yyyy">
                                            <input class="form-control bg-transparent" type="text" name="validity"/>
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            @error('validity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Add New">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('script')
    <script src="{{asset('assets/vendor_components/bootstrap/bootstrap3/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendor_components/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js')}}"></script>

    <Script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });
    </Script>
@endsection


