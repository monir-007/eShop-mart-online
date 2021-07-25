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
                    <div class="box bt-3 border-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List   <span
                                    class="badge badge-pill badge-danger">{{count($products)}}</span></h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name English</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($products as $item)
                                            <td><img src="{{ asset($item->product_thumbnail) }}"
                                                     style="width: 60px; height: 50px;"></td>
                                            <td>{{$item->name_eng}}</td>
                                            <td>{{$item->selling_price}} $</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>
                                                @if($item->discount_price===null)
                                                    <span class="badge-default"></span>
                                                @else
                                                    @php
                                                        $amount = $item->selling_price - $item->discount_price;
                                                        $discount = ($amount/$item->selling_price)*100;
                                                    @endphp
                                                    <span
                                                        class="badge badge-pill badge-light">{{round($discount)}} %</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($item->status === 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Deactivated</span>
                                                @endif
                                            </td>
                                            <td class="d-flex m-auto">
                                                <a href="{{route('product.details',$item->id)}}"
                                                   class="btn btn-dark btn-circle mr-2"
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Details"> <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="{{route('product.edit',$item->id)}}"
                                                   class="btn btn-success mr-2"
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Edit"> <i class="fa fa-edit"></i> </a>

                                                <a href="{{ route('product.delete',$item->id) }}" id="delete"
                                                   class="btn btn-danger mr-2" data-toggle="tooltip"
                                                   data-placement="bottom" title="Remove"> <i class="fa fa-trash"></i>
                                                </a>

                                                @if($item->status===1)
                                                    <a href="{{route('product.inactive',$item->id)}}"
                                                       class="btn btn-warning btn-circle  mr-2" id="inactive"
                                                       data-toggle="tooltip"
                                                       data-placement="bottom" title="Inactive product"> <i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{route('product.active',$item->id)}}"
                                                       class="btn btn-info btn-circle mr-2" id="active"
                                                       data-toggle="tooltip"
                                                       data-placement="bottom" title="Active product"> <i
                                                            class="fa fa-arrow-up"></i></a>

                                                @endif
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




