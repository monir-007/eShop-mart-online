@extends('user-view.layouts.app')
@section('title')
    Blog Page
@endsection
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Blog</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        @foreach($blogPost as $blog)
                            <div class="blog-post outer-bottom-small fadeInUp animated">
                                <a href="{{route('blog.details', $blog->id)}}"><img class="img-responsive"
                                                                                    src="{{asset($blog->post_image)}}"
                                                                                    alt=""></a>
                                <h1><a href="{{route('blog.details',$blog->id)}}">
                                        @if(session()->get('language') === 'bangla')
                                            {{$blog->title_bng}}
                                        @else
                                            {{$blog->title_eng}}
                                        @endif
                                    </a>
                                </h1>
                                <span
                                    class="date-time">{{\Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}</span>
                                <p> @if(session()->get('language') === 'bangla')
                                        {!! Str::limit(strip_tags($blog->details_bng), 200) !!}
                                    @else
                                        {!! Str::limit(strip_tags($blog->details_eng), 200) !!}
                                    @endif</p>

                                <a href="{{route('blog.details', $blog->id)}}"
                                   class="btn btn-upper btn-primary read-more">read
                                    more</a>
                            </div>
                        @endforeach
                        <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                             style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->    </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->
                    </div>
                    <div class="col-md-3 sidebar">


                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                                <form>
                                    <div class="control-group">
                                        <input placeholder="Type to search" class="search-field">
                                        <a href="#" class="search-button"></a>
                                    </div>
                                </form>
                            </div>

                            <div class="home-banner outer-top-n outer-bottom-xs">
                                <img src="{{asset('user-view/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                            </div>
                            <!-- ==============================================CATEGORY============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Category</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">
                                        @foreach($blogCategory as $category)
                                            <ul class="list-group ">
                                                <a href="{{url('blog/category/post/'.$category->id)}}">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                        style="background: #d7d4d4">
                                                        @if(session()->get('language') === 'bangla')
                                                            {{$category->name_bng}}
                                                        @else
                                                            {{$category->name_eng}}
                                                        @endif
                                                    </li>
                                                </a>
                                            </ul>
                                        @endforeach
                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== CATEGORY : END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                        {{--                            <div class="sidebar-widget product-tag wow fadeInUp">--}}
                        {{--                                <h3 class="section-title">Product tags</h3>--}}
                        {{--                                <div class="sidebar-widget-body outer-top-xs">--}}
                        {{--                                    <div class="tag-list">--}}
                        {{--                                        <a class="item" title="Phone" href="category.html">Phone</a>--}}
                        {{--                                        <a class="item active" title="Vest" href="category.html">Vest</a>--}}
                        {{--                                        <a class="item" title="Smartphone" href="category.html">Smartphone</a>--}}
                        {{--                                        <a class="item" title="Furniture" href="category.html">Furniture</a>--}}
                        {{--                                        <a class="item" title="T-shirt" href="category.html">T-shirt</a>--}}
                        {{--                                        <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>--}}
                        {{--                                        <a class="item" title="Sneaker" href="category.html">Sneaker</a>--}}
                        {{--                                        <a class="item" title="Toys" href="category.html">Toys</a>--}}
                        {{--                                        <a class="item" title="Rose" href="category.html">Rose</a>--}}
                        {{--                                    </div><!-- /.tag-list -->--}}
                        {{--                                </div><!-- /.sidebar-widget-body -->--}}
                        {{--                            </div><!-- /.sidebar-widget -->--}}
                        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                        </div>
                    </div>
                </div>
            </div>

        </div>


    @include('user-view.layouts.components._brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->

@endsection
@section('script')

@endsection






