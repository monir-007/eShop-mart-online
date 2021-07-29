@extends('user-view.layouts.app')
@section('title')
    Online eSuper shop
@endsection
@section('content')
    <div class="row">
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

            <!-- ================================== TOP NAVIGATION ================================== -->
        @include('user-view.layouts.components._sidebar-vertical-menu')
        <!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->

            <!-- ============================================== HOT DEALS ============================================== -->
        @include('user-view.layouts.components._hot-deals')
        <!-- ============================================== HOT DEALS: END ============================================== -->

            <!-- ============================================== SPECIAL OFFER ============================================== -->

            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Offer</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div
                        class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                @foreach($specialOffers as $product)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a
                                                                href="{{url('product/details/'.$product->id.'/'.$product->slug_eng)}}">
                                                                <img
                                                                    src="{{asset($product->product_thumbnail)}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="{{url('product/details/'.$product->id.'/'.$product->slug_eng)}}">
                                                                @if(session()->get('language') === 'bangla')
                                                                    {{$product->name_bng}}
                                                                @else
                                                                    {{$product->name_eng}}
                                                                @endif
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> ${{$product->selling_price}} </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== SPECIAL OFFER : END ============================================== -->
            <!-- ============================================== PRODUCT TAGS ============================================== -->
        @include('user-view.product-tags._product-tag')
        <!-- /.sidebar-widget -->
            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
            <!-- ============================================== SPECIAL DEALS ============================================== -->

            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Deals</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div
                        class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                @foreach($specialDeals as $product)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a
                                                                href="{{url('product/details/'.$product->id.'/'.$product->slug_eng)}}">
                                                                <img
                                                                    src="{{asset($product->product_thumbnail)}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="{{url('product/details/'.$product->id.'/'.$product->slug_eng)}}">
                                                                @if(session()->get('language') === 'bangla')
                                                                    {{$product->name_bng}}
                                                                @else
                                                                    {{$product->name_eng}}
                                                                @endif
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>

                                                        @if($product->discount_price===null)
                                                            <div class="product-price">
                                                                            <span
                                                                                class="price">${{$product->selling_price}}</span>
                                                            </div>
                                                        @else
                                                            <div class="product-price">
                                                                            <span
                                                                                class="price">${{$product->discount_price}}</span>
                                                                <span
                                                                    class="price-before-discount">${{$product->selling_price}}</span>
                                                            </div>
                                                    @endif
                                                    <!-- /.product-price -->
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== SPECIAL DEALS : END ============================================== -->
            <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
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
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
        <!-- /.sidebar-widget -->
            <!-- ============================================== NEWSLETTER: END ============================================== -->

            <!-- ============================================== Testimonials============================================== -->
        @include('user-view.layouts.components._testimonials')

        <!-- ============================================== Testimonials: END ============================================== -->

            <div class="home-banner"><img src="{{asset('user-view/assets/images/banners/LHS-banner.jpg')}}"
                                          alt="Image">
            </div>
        </div>

        <!-- /.sidemenu-holder -->

        <!-- ========================================== SECTION – HERO ================ -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

        @include('user-view.layouts.components._hero')

        <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">New Products</h3>
                    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                        <li class="active"><a data-transition-type="backSlide" href="#all"
                                              data-toggle="tab">All</a>
                        </li>
                        @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{$category->id}}"
                                   data-toggle="tab">
                                    @if(session()->get('language') === 'bangla')
                                        {{$category->name_bng}}
                                    @else
                                        {{$category->name_eng}}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- /.nav-tabs -->
                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                @foreach($products as $product)
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
                                                            <div class="tag new"><span>new</span></div>
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
                                                                               href="detail.html"
                                                                               title="Compare"> <i
                                                                        class="fa fa-signal"
                                                                        aria-hidden="true"></i>
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
                                    </div>
                                    <!-- /.item -->
                                @endforeach
                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.tab-pane -->

                    @foreach($categories as $category)
                        <div class="tab-pane " id="category{{$category->id}}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                     data-item="4">
                                    @php
                                        $categoryProducts = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp
                                    @forelse($categoryProducts as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"><a
                                                                href="{{url('product/details/'.$product->id.'/'.$product->slug_eng)}} "><img
                                                                    src="{{asset($product->product_thumbnail)}}"
                                                                    alt=""></a></div>
                                                        <!-- /.image -->

                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount/$product->selling_price) * 100;
                                                        @endphp

                                                        <div>
                                                            @if ($product->discount_price === NULL)
                                                                <div class="tag new"><span>new</span></div>
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
                                                                    class="price">$ {{$product->selling_price}}</span>
                                                            </div>
                                                        @else
                                                            <div class="product-price"><span
                                                                    class="price">$ {{$product->discount_price}}</span>
                                                                <span
                                                                    class="price-before-discount">$ {{$product->selling_price}}</span>
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
                                                                                   href="detail.html"
                                                                                   title="Compare">
                                                                        <i
                                                                            class="fa fa-signal"
                                                                            aria-hidden="true"></i>
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
                                        </div>
                                        <!-- /.item -->
                                    @empty
                                        <h5 class="text-warning">Category has no products</h5>
                                    @endforelse
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                    @endforeach


                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.scroll-tabs -->
            <!-- ============================================== SCROLL TABS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="wide-banner cnt-strip">
                            <div class="image"><img class="img-responsive"
                                                    src="{{asset('user-view/assets/images/banners/home-banner1.jpg')}}"
                                                    alt="">
                            </div>
                        </div>
                        <!-- /.wide-banner -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-5 col-sm-5">
                        <div class="wide-banner cnt-strip">
                            <div class="image"><img class="img-responsive"
                                                    src="{{asset('user-view/assets/images/banners/home-banner2.jpg')}}"
                                                    alt="">
                            </div>
                        </div>
                        <!-- /.wide-banner -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.wide-banners -->

            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Featured products</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                    @foreach($featured as $product)
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
                                            <div class="product-price">
                                                <span class="price">${{$product->discount_price}}</span>
                                                <span class="price-before-discount">${{$product->selling_price}}</span>
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
                                                            type="button">Add to cart
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


                                                <li class="lnk">
                                                    <a data-toggle="tooltip"
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
                        </div>
                        <!-- /.item -->
                    @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            <!-- ============================================== CATEGORY_0 PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">
                    @if(session()->get('language') === 'bangla')
                        {{$categoryData_0->name_bng}}
                    @else
                        {{$categoryData_0->name_eng}}
                    @endif
                </h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                    @foreach($productData_0 as $product)
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
                                                        Add to cart
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
                        </div>
                        <!-- /.item -->
                    @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== CATEGORY_0 PRODUCTS : END ============================================== -->

            <!-- ============================================== CATEGORY_1 PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">
                    @if(session()->get('language') === 'bangla')
                        {{$categoryData_1->name_bng}}
                    @else
                        {{$categoryData_1->name_eng}}
                    @endif
                </h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                    @foreach($productData_1 as $product)
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
                                                        <i
                                                            class="fa fa-signal" aria-hidden="true"></i>
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
                        </div>
                        <!-- /.item -->
                    @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== CATEGORY_0 PRODUCTS : END ============================================== -->

            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wide-banner cnt-strip">
                            <div class="image"><img class="img-responsive"
                                                    src="{{asset('user-view/assets/images/banners/home-banner.jpg')}}"
                                                    alt="">
                            </div>
                            <div class="strip strip-text">
                                <div class="strip-inner">
                                    <h2 class="text-right">New Mens Fashion<br>
                                        <span class="shopping-needs">Save up to 40% off</span></h2>
                                </div>
                            </div>
                            <div class="new-label">
                                <div class="text">NEW</div>
                            </div>
                            <!-- /.new-label -->
                        </div>
                        <!-- /.wide-banner -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.wide-banners -->
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

            <!-- ============================================== BRAND_10 PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">
                    @if(session()->get('language') === 'bangla')
                        {{$brandData_10->name_bng}}
                    @else
                        {{$brandData_10->name_eng}}
                    @endif
                </h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                    @foreach($productData_10 as $product)
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
                                                        <i
                                                            class="fa fa-signal" aria-hidden="true"></i>
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
                        </div>
                        <!-- /.item -->
                    @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== BRAND_10 PRODUCTS : END ============================================== -->
            <!-- ============================================== BEST SELLER ============================================== -->

            <div class="best-deal wow fadeInUp outer-bottom-xs">
                <h3 class="section-title">Best seller</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p20.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p21.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p22.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p23.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p24.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p25.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p26.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a href="#"> <img
                                                                src="{{asset('user-view/assets/images/products/p27.jpg')}}"
                                                                alt=""> </a></div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"><span
                                                            class="price"> $450.99 </span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== BEST SELLER : END ============================================== -->

            <!-- ============================================== BLOG SLIDER ============================================== -->
            <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                <h3 class="section-title">latest form blog</h3>
                <div class="blog-slider-container outer-top-xs">
                    <div class="owl-carousel blog-slider custom-carousel">
                        @foreach($blogPost as $item)
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="{{route('blog.details', $item->id)}}"><img
                                                    src="{{asset($item->post_image)}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="{{route('blog.details', $item->id)}}">
                                                @if(session()->get('language') === 'bangla')
                                                    {{$item->title_bng}}
                                                @else
                                                    {{$item->title_eng}}
                                                @endif
                                            </a></h3>
                                        <span
                                            class="info">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                                        <p class="text">
                                            @if(session()->get('language') === 'bangla')
                                                {!! Str::limit($item->details_bng, 100) !!}
                                            @else
                                                {!! Str::limit($item->details_eng, 100) !!}
                                            @endif
                                        </p>
                                        <a href="{{route('blog.details', $item->id)}}" class="lnk btn btn-primary">Read
                                            more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <!-- /.blog-slider-container -->
            </section>
            <!-- /.section -->
            <!-- ============================================== BLOG SLIDER : END ============================================== -->

            <!-- ============================================== NEW ARRIVALS PRODUCTS ============================================== -->
            <section class="section wow fadeInUp new-arriavls">
                <h3 class="section-title">New Arrivals</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"><a href="detail.html"><img
                                                src="{{asset('user-view/assets/images/products/p19.jpg')}}"
                                                alt=""></a></div>
                                    <!-- /.image -->

                                    <div class="tag new"><span>new</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price"> $450.99 </span> <span
                                            class="price-before-discount">$ 800</span></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"><i
                                                        class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart
                                                </button>
                                            </li>
                                            <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                        title="Wishlist">
                                                    <i class="icon fa fa-heart"></i> </a></li>
                                            <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                               title="Compare">
                                                    <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                        </div>
                        <!-- /.products -->
                    </div>
                    <!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"><a href="detail.html"><img
                                                src="{{asset('user-view/assets/images/products/p28.jpg')}}"
                                                alt=""></a></div>
                                    <!-- /.image -->

                                    <div class="tag new"><span>new</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price"> $450.99 </span> <span
                                            class="price-before-discount">$ 800</span></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"><i
                                                        class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart
                                                </button>
                                            </li>
                                            <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                        title="Wishlist">
                                                    <i class="icon fa fa-heart"></i> </a></li>
                                            <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                               title="Compare">
                                                    <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                        </div>
                        <!-- /.products -->
                    </div>
                    <!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"><a href="detail.html"><img
                                                src="{{asset('user-view/assets/images/products/p30.jpg')}}"
                                                alt=""></a></div>
                                    <!-- /.image -->

                                    <div class="tag hot"><span>hot</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price"> $450.99 </span> <span
                                            class="price-before-discount">$ 800</span></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"><i
                                                        class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart
                                                </button>
                                            </li>
                                            <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                        title="Wishlist">
                                                    <i class="icon fa fa-heart"></i> </a></li>
                                            <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                               title="Compare">
                                                    <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                        </div>
                        <!-- /.products -->
                    </div>
                    <!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"><a href="detail.html"><img
                                                src="{{asset('user-view/assets/images/products/p1.jpg')}}"
                                                alt=""></a></div>
                                    <!-- /.image -->

                                    <div class="tag hot"><span>hot</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price"> $450.99 </span> <span
                                            class="price-before-discount">$ 800</span></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"><i
                                                        class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart
                                                </button>
                                            </li>
                                            <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                        title="Wishlist">
                                                    <i class="icon fa fa-heart"></i> </a></li>
                                            <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                               title="Compare">
                                                    <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                        </div>
                        <!-- /.products -->
                    </div>
                    <!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"><a href="detail.html"><img
                                                src="{{asset('user-view/assets/images/products/p2.jpg')}}"
                                                alt=""></a></div>
                                    <!-- /.image -->

                                    <div class="tag sale"><span>sale</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price"> $450.99 </span> <span
                                            class="price-before-discount">$ 800</span></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"><i
                                                        class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart
                                                </button>
                                            </li>
                                            <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                        title="Wishlist">
                                                    <i class="icon fa fa-heart"></i> </a></li>
                                            <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                               title="Compare">
                                                    <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                        </div>
                        <!-- /.products -->
                    </div>
                    <!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"><a href="detail.html"><img
                                                src="{{asset('user-view/assets/images/products/p3.jpg')}}"
                                                alt=""></a></div>
                                    <!-- /.image -->

                                    <div class="tag sale"><span>sale</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price"> $450.99 </span> <span
                                            class="price-before-discount">$ 800</span></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"><i
                                                        class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart
                                                </button>
                                            </li>
                                            <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                        title="Wishlist">
                                                    <i class="icon fa fa-heart"></i> </a></li>
                                            <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                               title="Compare">
                                                    <i
                                                        class="fa fa-signal" aria-hidden="true"></i> </a></li>
                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                        </div>
                        <!-- /.products -->
                    </div>
                    <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        </div>
    </div>
    @include('user-view.layouts.components._brands')

@endsection
