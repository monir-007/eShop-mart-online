@extends('user-view.layouts.app')
@section('title')
    My Cart
@endsection
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>MyCart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Cart</th>
                                </tr>
                                <tr>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-product-name item">Color</th>
                                    <th class="cart-product-name item">Size</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-romove item">Remove</th>
                                </tr>
                                </thead><!-- /thead -->
                                <tbody id="myCartPage">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->

        </div><!-- /.container -->
    </div><!-- /.body-content -->

    @include('user-view.layouts.components._brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->


@endsection
