@extends('user-view.layouts.app')
@section('title')
    My Return Orders
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
                                    <label for="">Return Issue Date</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Order Status</label>
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
                                        <label for="">{{$order->return_date}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">
                                            {{-- in DB feild it is varchar--}}
                                            @if($order->return_order == 0)
                                                <span class="badge badge-pill badge-warning"
                                                      style="background: #418D89">No Return Request</span>
                                            @elseif($order->return_order == 1)
                                                <span class="badge badge-pill badge-warning"
                                                      style="background: #bfad28">Pending</span>
                                                <span class="badge badge-pill badge-warning"
                                                      style="background: red">Return requested</span>
                                            @elseif($order->return_order == 2)
                                                <span class="badge badge-pill badge-warning"
                                                      style="background: #48bd0b">Success</span>
                                            @endif
                                        </label>
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
