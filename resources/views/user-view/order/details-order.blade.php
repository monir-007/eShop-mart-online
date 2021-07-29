@extends('user-view.layouts.app')
@section('title')
    Shipping Details
@endsection
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user-view.layouts.components._user-sidebar')
                <div class="col-md-1"></div><!-- end col-md-8 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shipping Details</h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC">
                            <table class="table">
                                <tr>
                                    <th>Shipping Name</th>
                                    <th>{{$order->name}}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Phone</th>
                                    <th>{{$order->phone}}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Email</th>
                                    <th>{{$order->email}}</th>
                                </tr>
                                <tr>
                                    <th>Division</th>
                                    <th>{{$order->division->name}}</th>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <th>{{$order->district->name}}</th>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <th>{{$order->state->name}}</th>
                                </tr>
                                <tr>
                                    <th>Post Code</th>
                                    <th>{{$order->post_code}}</th>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <th>{{$order->order_date}}</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div><!-- end col-md-5 -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details<span class="text-danger"> Invoice: {{$order->invoice_no}}</span></h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC">
                            <table class="table">
                                <tr>
                                    <th> Name</th>
                                    <th>{{$order->user->name}}</th>
                                </tr>
                                <tr>
                                    <th> Phone</th>
                                    <th>{{$order->user->phone}}</th>
                                </tr>
                                <tr>
                                    <th>Payment Type</th>
                                    <th>{{$order->payment_method}}</th>
                                </tr>
                                <tr>
                                    <th>Tranx ID:</th>
                                    <th>{{$order->transaction_id}}</th>
                                </tr>
                                <tr>
                                    <th>Invoice:</th>
                                    <th>{{$order->invoice_no}}</th>
                                </tr>
                                <tr>
                                    <th>Order Total:</th>
                                    <th>{{$order->amount}}</th>
                                </tr>
                                <tr>
                                    <th>Order</th>
                                    <th>
                                        <span class="badge badge-pill badge-warning"
                                              style="background: #418D89">{{$order->status}}</span>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div><!-- end col-md-5 -->

                <div class="row">
                    <div class="col-md-11">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr style="background: #e2e8f0">
                                    <td class="col-md-2">
                                        <label for="">Image</label>
                                    </td>
                                    <td class="col-md-4">
                                        <label for="">Product Name</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Product Code</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Color</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Size</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quantity</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Price</label>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderItem as $item)
                                    <tr class="bg-secondary">
                                        <td class="col-md-2">
                                            <label for=""><img src="{{asset($item->product->product_thumbnail)}}"
                                                               height="50px;" width="50px;"></label>
                                        </td>
                                        <td class="col-md-4">
                                            <label for="">{{$item->product->name_eng}}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="">{{$item->product->code}}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="">{{$item->color}}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="">{{$item->size}}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="">{{$item->qty}}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">${{$item->price}} ({{$item->price*$item->qty}})</label>
                                        </td>


                                    </tr>
                                @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div> <!-- end col-md-11 -->
                    @if($order->status !== "delivered")
                    @else
                        @php
                            $order = App\Models\Order::where('id', $order->id)->where('return_reason','=', null)->first();
                        @endphp

                        <div class="col-md-11">
                            @if($order)
                                <form action="{{route('return.order', $order->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="label">Order Return Reason</label>
                                        <textarea name="return_reason" id="" cols="30" rows="5" class="form-control"
                                                  placeholder="write your reason to return order"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Return Order</button>
                                    </div>
                                </form>
                            @else
                                <div class="form-group">
                                    <span class="badge badge-pill badge-warning" style="background: red">You have send return request.</span>
                                </div>
                                @endif
                        </div>
                    @endif
                </div>


            </div><!-- end row -->

        </div>
    </div>

@endsection
