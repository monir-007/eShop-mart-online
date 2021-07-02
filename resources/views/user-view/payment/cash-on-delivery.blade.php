@extends('user-view.layouts.app')
@section('title')
    Cash On Delivery Payment
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Cash On Delivery</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box">
                <div class="row">
                    <div class="col-md-5">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Shopping Amount</h4>

                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            <hr>
                                            <li>
                                                @if(Session::has('coupon'))
                                                    <strong>SubTotal: </strong>${{ $cartTotal }}
                                                    <hr>
                                                    <strong>Coupon
                                                        Code: </strong>{{ session()->get('coupon')['name'] }}
                                                    ({{session()->get('coupon')['discount']}}%)
                                                    <hr>
                                                    <strong>Coupon Code: </strong>
                                                    ${{ session()->get('coupon')['discountAmount'] }}
                                                    <hr>
                                                    <strong>Grand Total: </strong>
                                                    ${{ session()->get('coupon')['totalAmount'] }}
                                                    <hr>
                                                @else
                                                    <strong>SubTotal: </strong>${{ $cartTotal }}
                                                    <hr>
                                                    <strong>Grand Total: </strong>${{ $cartTotal }}
                                                    <hr>
                                                @endif
                                            </li>
                                            <hr>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>

                    <div class="col-md-5">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Way</h4>
                                    </div>

                                    <form action="{{route('cash.on.delivery.payment')}}" method="post" id="payment-form">
                                        @csrf
                                        <div class="form-row">
                                            <img src="{{asset('user-view/assets/images/payments/cash.png')}}" alt="">
                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">

                                        </div>
                                        <br>
                                        <button class="btn btn-primary">Submit Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>

                </div><!-- /.row -->

            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    @include('user-view.layouts.components._brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->

@endsection







