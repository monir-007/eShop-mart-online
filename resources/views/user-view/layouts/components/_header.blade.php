<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{route('blog.index')}}"><i class="icon fa fa-outdent"></i>
                                @if(session()->get('language') === 'bangla')
                                    ব্লগ
                                @else
                                    Blog
                                @endif
                            </a></li>
                        <li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{route('mycart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="{{route('checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>

                        @auth
                            <li><a href="{{url('/dashboard')}}"><i class="icon fa fa-user"></i>
                                    @if(session()->get('language') === 'bangla')
                                        আমার প্রোফাইল
                                    @else
                                        profile
                                    @endif
                                </a></li>
                        @else
                            <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login\Register</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"><a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                               data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown"
                               data-toggle="dropdown"><span class="value">
                                    @if(session()->get('language') === 'bangla') ভাষা: বাংলা
                                    @else Language
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language') === 'bangla')
                                    <li><a href="{{ route('language.english') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('language.bangla') }}">বাংলা</a></li>
                                @endif
                            </ul>
                        </li><!-- /.list-unstyled -->
                    </ul>
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"><a href="{{route('home')}}"> <img
                                src="{{asset('user-view/assets/images/logo.png')}}" alt="logo"> </a></div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..."/>
                                <a class="search-button" href="#"></a></div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"><a href="#" class="dropdown-toggle lnk-cart"
                                                           data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span>
                                    <span class="total-price"> <span class="sign">$</span>
                                        <span class="value" id="cartSubTotalId">600.00</span> </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div id="miniCart">

                                </div>
                                <div class="clearfix cart-total">
                                    <div class="pull-right">
                                        <span class="text">Sub Total : $</span>
                                        <span class='price' id="cartSubTotalId"></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button href="checkout.html"
                                            class="btn btn-upper btn-primary btn-block m-t-20">Checkout
                                    </button>
                                </div>
                                <!-- /.cart-total-->
                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{route('home')}}">
                                        @if(session()->get('language') === 'bangla')
                                            বাড়ি
                                        @else
                                            Home
                                        @endif
                                    </a>
                                </li>
                                <!-- Category table data -->
                                @php
                                    $categories = App\Models\Category::orderBy('name_eng','ASC')->get();
                                @endphp
                                @foreach($categories as $category)
                                    <li class="dropdown yamm mega-menu">
                                        <a href="home.html" data-hover="dropdown"
                                           class="dropdown-toggle" data-toggle="dropdown">
                                            @if(session()->get('language') === 'bangla')
                                                {{$category->name_bng}}
                                            @else
                                                {{$category->name_eng}}
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('name_eng','ASC')->get();
                                                        @endphp
                                                        @foreach($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                <h2 class="title">
                                                                    <a href="{{url('subcategory/products/'.$subcategory->id.'/'.$subcategory->slug_eng)}}">
                                                                        @if(session()->get('language') === 'bangla')
                                                                            {{$subcategory->name_bng}}
                                                                        @else
                                                                            {{$subcategory->name_eng}}
                                                                        @endif
                                                                    </a>
                                                                </h2>
                                                                @php
                                                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)->orderBy('name_eng','ASC')->get();
                                                                @endphp
                                                                @foreach($subsubcategories as $subsubcategory)
                                                                    <ul class="links">
                                                                        <li>
                                                                            <a href="{{url('sub-subcategory/products/'.$subsubcategory->id.'/'.$subsubcategory->slug_eng)}}">
                                                                                @if(session()->get('language') === 'bangla')
                                                                                    {{$subsubcategory->name_bng}}
                                                                                @else
                                                                                    {{$subsubcategory->name_eng}}
                                                                                @endif
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </div>
                                                    @endforeach
                                                    <!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img
                                                                class="img-responsive"
                                                                src="{{asset('user-view/assets/images/banners/top-menu-banner.jpg')}}"
                                                                alt="">
                                                        </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                                <li class="dropdown  navbar-right special-menu"><a href="#">Todays offer</a></li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
