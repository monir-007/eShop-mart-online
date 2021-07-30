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
                                <li class="breadcrumb-item active" aria-current="page">All Return Order list</li>
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
                            <h3 class="box-title">All Return Order list</h3>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-transparent">
                                            @foreach($orders as $item)
                                                <td>{{$item->order_date}}</td>
                                                <td>{{$item->invoice_no}}</td>
                                                <td>${{$item->amount}}</td>
                                                <td>{{$item->payment_method}}</td>
                                                <td>
                                                    @if($item->return_order === 1)
                                                        <span
                                                            class="badge badge-pill badge-warning">Pending</span>
                                                    @elseif($item->return_order=== 2)
                                                        <span
                                                            class="badge badge-pill badge-success">Success</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <span class="badge badge-success" style="background: #51c215">Return Approved</span>
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



