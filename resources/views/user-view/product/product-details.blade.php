@extends('user-view.layouts.app')
@section('title')
    {{$product->name_eng}} Product Details
@endsection
@section('content')

    <!-- ===== ======== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li class='active'>
                        @if(session()->get('language') === 'bangla')
                            {{$product->name_bng}}
                        @else
                            {{$product->name_eng}}
                        @endif</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{asset('user-view/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                        </div>


                        <!-- ============================================== HOT DEALS ============================================== -->
                    @include('user-view.layouts.components._hot-deals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                            <h3 class="section-title">Newsletters</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <p>Sign Up for Our Newsletter!</p>
                                <form>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Subscribe to our newsletter">
                                    </div>
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                            <div id="advertisement" class="advertisement">
                                <div class="item">
                                    <div class="avatar"><img
                                            src="{{asset('user-view/assets/images/testimonials/member1.png')}}"
                                            alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">John Doe <span>Abc Company</span></div>
                                    <!-- /.container-fluid -->
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img
                                            src="{{asset('user-view/assets/images/testimonials/member3.png')}}"
                                            alt="Image"></div>
                                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span></div>
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img
                                            src="{{asset('user-view/assets/images/testimonials/member2.png')}}"
                                            alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span></div>
                                    <!-- /.container-fluid -->
                                </div><!-- /.item -->

                            </div><!-- /.owl-carousel -->
                        </div>

                        <!-- ============================================== Testimonials: END ============================================== -->

                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        @foreach($images as $image)
                                            <div class="single-product-gallery-item" id="slide{{$image->id}}">
                                                <a data-lightbox="image-1" data-title="Gallery"
                                                   href="{{asset($image->photo_name)}}">
                                                    <img class="img-responsive" alt=""
                                                         src="{{asset($image->photo_name)}}"
                                                         data-echo="{{asset($image->photo_name)}}"/>
                                                </a>
                                            </div><!-- /.single-product-gallery-item -->
                                        @endforeach
                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            @foreach($images as $image)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                       data-slide="1" href="#slide{{$image->id}}">
                                                        <img class="img-responsive" width="85" alt=""
                                                             src="{{asset($image->photo_name)}}"
                                                             data-echo="{{asset($image->photo_name)}}"/>
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div><!-- /#owl-single-product-thumbnails -->


                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">
                                        @if(session()->get('language') === 'bangla')
                                            {{$product->name_bng}}
                                        @else
                                            {{$product->name_eng}}
                                        @endif
                                    </h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if(session()->get('language') === 'bangla')
                                            {{ strip_tags($product->short_description_bng) }}
                                        @else
                                            {{ strip_tags($product->short_description_eng) }}
                                        @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if($product->discount_price===null)
                                                        <span class="price">${{$product->selling_price}}</span>
                                                    @else
                                                        <span class="price">${{$product->discount_price}}</span>
                                                        <span class="price-strike">${{$product->selling_price}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <button data-toggle="tooltip"
                                                            class="btn btn-primary icon"
                                                            id="{{$product->id}}"
                                                            onclick="addToWishlist(this.id)"
                                                            title="Wishlist"
                                                            type="button">
                                                        <i class="icon fa fa-heart"></i>
                                                    </button>

                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                        <!-- /.price-container -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="info-title control-label">Choose Size
                                                        <span> </span></label>
                                                    <select class="form-control unicase-form-control selectpicker ">
                                                        <option selected="" disabled="">-Choose Size-</option>
                                                        @if(session()->get('language') === 'bangla')
                                                            @foreach($productSizeBng as $size)
                                                                <option value="{{$size}}"
                                                                        class="text-capitalize">{{ucwords($size)}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($productSizeEng as $size)
                                                                <option value="{{$size}}"
                                                                        class="text-capitalize">{{ucwords($size)}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="info-title control-label">Choose Color <span> </span></label>
                                                    <select class="form-control unicase-form-control selectpicker ">
                                                        <option selected="" disabled="">-Choose Color-</option>
                                                        @if(session()->get('language') === 'bangla')
                                                            @foreach($productColorBng as $color)
                                                                <option value="{{$color}}"
                                                                        class="text-capitalize">{{ucwords($color)}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($productColorEng as $color)
                                                                <option value="{{$color}}"
                                                                        class="text-capitalize">{{ucwords($color)}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.size and color -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <a href="#" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->

                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                    <li><a data-toggle="tab" href="#share">SHARE THIS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if(session()->get('language') === 'bangla')
                                                    {!! strip_tags($product->long_description_bng) !!}
                                                @else
                                                    {!! strip_tags($product->long_description_eng) !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>
                                                @php
                                                    $reviews = \App\Models\ProductReview::where('product_id',$product->id)->latest()->limit(5)->get();
                                                @endphp
                                                <div class="reviews">

                                                    @foreach($reviews as $item)
                                                        @if($item->status === 0)
                                                        @else
                                                            <div class="review">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <img style="border-radius:50%"
                                                                             src="{{ (!empty($item->user->profile_photo_path))?url('images/upload/users/'.$item->user->profile_photo_path):url('images/upload/no_image.jpg') }}"
                                                                             alt="profile image" height="40px"
                                                                             width="40px">
                                                                        <b> {{ $item->user->name }}</b>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    </div>
                                                                </div> <!-- // end row -->
                                                                <div class="review-title"><span
                                                                        class="summary">{{$item->summary}}</span><span
                                                                        class="date"><i
                                                                            class="fa fa-calendar"></i><span>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span></span>
                                                                </div>
                                                                <div
                                                                    class="text">{!! strip_tags($item->comment) !!}</div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->


                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    @guest
                                                        <p><b> Review this Product !. You haven't logged in yet. <a
                                                                    href="{{ route('login') }}">Please login</a> </b>
                                                        </p>
                                                    @else
                                                        <div class="form-container">
                                                            <form role="form" method="post"
                                                                  action="{{route('product.review.store')}}"
                                                                  class="cnt-form">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                       value="{{$product->id}}">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputSummary">Summary
                                                                                <span
                                                                                    class="astk">*</span></label>
                                                                            <input type="text" name="summary"
                                                                                   class="form-control txt"
                                                                                   id="exampleInputSummary"
                                                                                   placeholder="write the subject">
                                                                        </div><!-- /.form-group -->
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputReview">Review <span
                                                                                    class="astk">*</span></label>
                                                                            <textarea
                                                                                class="form-control txt txt-review"
                                                                                name="comment" id="exampleInputReview"
                                                                                rows="4"
                                                                                placeholder=""></textarea>
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                </div><!-- /.row -->

                                                                <div class="action text-right">
                                                                    <button type="submit"
                                                                            class="btn btn-primary btn-upper">SUBMIT
                                                                        REVIEW
                                                                    </button>
                                                                </div><!-- /.action -->

                                                            </form><!-- /.cnt-form -->
                                                        </div><!-- /.form-container -->
                                                    @endguest
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag"
                                                               class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS
                                                    </button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="share" class="tab-pane">
                                        <div class="product-tag">
                                            <h4 class="title">Want to Share this Product ?</h4>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-11">
                                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                    <div class="addthis_inline_share_toolbox"></div>

                                                </div>
                                            </div>
                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related products</h3>
                        <div
                            class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($relatedProduct as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"><a
                                                        href="{{url('product/details/'.$product->id.'/'.$product->slug_eng)}}"><img
                                                            src="{{asset($product->product_thumbnail)}}"
                                                            alt=""></a>
                                                </div>
                                                <!-- /.image -->

                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                @endphp

                                                <div>
                                                    @if ($product->discount_price === NULL)
                                                        <div class="tag sale"><span>sale</span></div>
                                                    @else
                                                        <div class="tag hot">
                                                            <span>{{ round($discount) }}%</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{url('product/details/'.$product->id.'/'.$product->slug_eng)}}">
                                                        @if(session()->get('language') === 'bangla')
                                                            {{$product->name_bng}}
                                                        @else
                                                            {{$product->name_eng}}
                                                        @endif
                                                    </a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                @if($product->discount_price===null)
                                                    <div class="product-price"><span
                                                            class="price">${{$product->selling_price}}</span>
                                                    </div>
                                                @else
                                                    <div class="product-price"><span
                                                            class="price">${{$product->discount_price}}</span>
                                                        <span
                                                            class="price-before-discount">${{$product->selling_price}}</span>
                                                    </div>
                                            @endif
                                            <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button data-toggle="modal"
                                                                    data-target="#addToCartModal"
                                                                    class="btn btn-primary icon"
                                                                    id="{{$product->id}}"
                                                                    onclick="productShow(this.id)"
                                                                    title="Add Cart"
                                                                    type="button">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn"
                                                                    type="button">
                                                                Add
                                                                to cart
                                                            </button>
                                                        </li>
                                                        <li class="wishlist">
                                                            <button data-toggle="tooltip"
                                                                    class="btn btn-primary icon"
                                                                    id="{{$product->id}}"
                                                                    onclick="addToWishlist(this.id)"
                                                                    title="Wishlist"
                                                                    type="button">
                                                                <i class="icon fa fa-heart"></i>
                                                            </button>
                                                        </li>
                                                        <li class="lnk"><a data-toggle="tooltip"
                                                                           class="add-to-cart"
                                                                           href="detail.html" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                        </div>
                                        <!-- /.product -->

                                    </div>
                                    <!-- /.products -->
                                </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
        </div>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript"
                src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6104d834deb0d2b9"></script>

@endsection
