@extends('user-view.layouts.app')
@section('title')
    My Checkout
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->

                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <form class="register-form" role="form">
                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <h4 class="checkout-subtitle"><b>Shipping Information</b></h4>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Shipping Name
                                                            <span>*</span></label>
                                                        <input type="text" name="shipping_name"
                                                               value="{{Auth::user()->name}}"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputEmail1" placeholder="Full Name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email Address
                                                            <span>*</span></label>
                                                        <input type="email" name="shipping_email"
                                                               value="{{Auth::user()->email}}"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputEmail1" placeholder="User Email"
                                                               required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">Phone
                                                            Number
                                                            <span>*</span></label>
                                                        <input type="number" name="shipping_phone"
                                                               value="{{Auth::user()->phone}}"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputPassword1"
                                                               placeholder="User Phone Number" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">Post Code
                                                            <span>*</span></label>
                                                        <input type="text" name="post_code"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputPassword1" placeholder="Post Code"
                                                               required>
                                                    </div>

                                                </div>
                                                <!-- guest-login -->

                                                <!-- already-registered-login -->
                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">Select
                                                            Division
                                                            <span>*</span></label>
                                                        <div class="controls">
                                                            <select name="division_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">Select
                                                                    Division
                                                                </option>
                                                                @foreach($divisions as $item)
                                                                    <option
                                                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">Select
                                                            District
                                                            <span>*</span></label>
                                                        <div class="controls">
                                                            <select name="district_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">Select
                                                                    District
                                                                </option>
                                                            </select>
                                                            @error('district_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">Select
                                                            State
                                                            <span>*</span></label>
                                                        <div class="controls">
                                                            <select name="state_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">Select State
                                                                </option>
                                                            </select>
                                                            @error('state_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Notes
                                                            <span>*</span></label>
                                                        <textarea class="form-control" cols="25" rows="3"
                                                                  placeholder="Notes" name="notes"></textarea>
                                                    </div>
                                                    <button type="submit"
                                                            class="btn-upper btn btn-primary checkout-page-button">Login
                                                    </button>
                                                </div>
                                                <!-- already-registered-login -->
                                            </form>
                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->

                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                                <li><strong>Image: </strong>
                                                    <img src="{{asset($item->options->image)}}"
                                                         style="height: 50px;width: 50px;" alt="">
                                                </li>

                                                <li>
                                                    <strong>Quantity: </strong>({{$item->qty}})
                                                    <strong>Color: </strong>{{$item->options->color}}
                                                    <strong>Size: </strong>{{$item->options->size}}
                                                </li>
                                                <hr>
                                            @endforeach
                                            <li>
                                                @if(Session::has('coupon'))
                                                    <strong>SubTotal: </strong>${{ $cartTotal }}
                                                    <br>
                                                    <strong>Coupon Code: </strong>{{ session()->get('coupon')['name'] }}
                                                    ({{session()->get('coupon')['discount']}}%)
                                                    <br>
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

                                            <li><a href="#">Payment Method</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->                </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    @include('user-view.layouts.components._brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function(){
                let division_id = $(this).val();
                if(division_id) {
                    $.ajax({
                        url: "{{  url('/district/get') }}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="state_id"]').empty();
                            $('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="district_id"]').on('change', function(){
                let district_id = $(this).val();
                if(district_id) {
                    $.ajax({
                        url: "{{  url('/state/get') }}/"+district_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="state_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        })

    </script>
@endsection






