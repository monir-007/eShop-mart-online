@extends('user-view.layouts.app')
@section('title')
    My Order List
@endsection
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user-view.layouts.components._user-sidebar')
                <div class="col-md-1"></div><!-- end col-md-1 -->
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr style="background: #e2e8f0">
                                <td class="col-md-2">
                                    <label for="">Date</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Total</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Payment</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Invoice</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Order</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Action</label>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr class="bg-secondary">
                                    <td class="col-md-2">
                                        <label for="">{{$order->order_date}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">${{$order->amount}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{$order->payment_method}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{$order->invoice_no}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        @if($order->status === 'pending')
                                            <label for="">
                                                <span class="badge badge-pill badge-warning"
                                                      style="background: #bfad28">
                                                    Pending
                                                </span>
                                                @elseif($order->status === 'confirm')
                                                    <span class="badge badge-pill badge-warning"
                                                          style="background: #f5a50b">
                                                   Confirm
                                                </span>
                                                @elseif($order->status === 'processing')
                                                    <span class="badge badge-pill badge-warning"
                                                          style="background: #15d40b">
                                                    Processing
                                                </span>
                                                @elseif($order->status === 'picked')
                                                    <span class="badge badge-pill badge-warning"
                                                          style="background: #2aa0e2">
                                                    Picked
                                                </span>
                                                @elseif($order->status === 'shipped')
                                                    <span class="badge badge-pill badge-warning"
                                                          style="background: #18d774">
                                                    Shipped
                                                </span>
                                                @elseif($order->status === 'delivered')
                                                    <span class="badge badge-pill badge-warning"
                                                          style="background: #848480">
                                                    Delivered
                                                </span>
                                                    @if($order->return_order === 1)
                                                        <span class="badge badge-pill badge-warning"
                                                              style="background: red">Return requested</span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-pill badge-warning"
                                                          style="background: #c7213b">
                                                    Cancel
                                                </span>
                                                @endif
                                            </label>
                                    </td>
                                    <td class="col-md-2">
                                        <a href="{{url('user/order/details/'.$order->id)}}"
                                           class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
                                        <a target="_blank" href="{{url('user/invoice/download/'.$order->id)}}"
                                           class="btn btn-sm btn-danger" style="margin-top: 5px;"><i
                                                class="fa fa-download"></i> Invoice</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div> <!-- end col-md-9 -->
            </div><!-- end row -->

        </div>
    </div>

@endsection
