@extends('admin.layouts.app')
@section('style')

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
                                <li class="breadcrumb-item active" aria-current="page">Coupon list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- =============== Add New Brand ================== -->
                <div class="col-4">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Edit Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('coupon.update',$coupon->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" value="{{$coupon->name}}" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" value="{{$coupon->discount}}" class="form-control">
                                            @error('discount')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Validity <span class="text-danger">*</span></h5>
                                        <div id="datepicker" class="input-group date controls"
                                             data-date-format="mm-dd-yyyy">
                                            <input class="form-control bg-transparent" type="text" name="validity"
                                                   value="{{$coupon->validity}}" readonly/>
                                            <span class="input-group-addon" role="button"><i
                                                    class="glyphicon glyphicon-calendar"></i></span>
                                            @error('validity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Update">
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
    {{--    <script src="{{asset('assets/vendor_components/bootstrap/bootstrap3/js/bootstrap.min.js')}}"></script>--}}
    <script src="{{asset('assets/vendor_components/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js')}}"></script>

    <Script type="text/javascript">
        let date = new Date();
        date.setDate(date.getDate())

        $(function () {
            $("#datepicker").datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                startDate: date,
                orientation: "auto",
                clearBtn: true,
            })
        });
    </Script>
@endsection


