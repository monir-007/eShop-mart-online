@extends('admin.layouts.app')
@section('admin-index')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.profile')}}"><i
                                            class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box bt-3 border-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Details of <span class="text-white">{{$products->name_eng}}</span>
                        </h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">

                                <!-- start 1st row -->
                                <div class="row bt-1 border-warning">
                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>Brand Select </h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products['brandName']['name_eng']}}" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>Category Select </h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products['categoryName']['name_eng']}}" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>SubCategory Select</h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products['subcategoryName']['name_eng']}}" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>Sub|Subcategory Select</h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products['subSubcategoryName']['name_eng']}}" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->
                                </div><!-- end 1st row -->

                                <!-- start 2nd row -->
                                <div class="row bb-1 bt-1 border-warning">
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <h5>Name English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{$products->name_eng}}"
                                                       class="form-control text-white" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <h5>Name Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{$products->name_bng}}"
                                                       class="form-control text-white" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 6 -->

                                </div> <!-- end 2nd row -->

                                <!-- start 3rd row -->
                                <div class="row bb-1 border-warning">
                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{$products->code }}"
                                                       class="form-control text-white" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>Quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{$products->quantity}}"
                                                       class="form-control text-white" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{$products->selling_price}}"
                                                       class="form-control text-white" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <h5>Discount Price</h5>
                                            <div class="controls">
                                                <input type="text" value="{{$products->discount_price}}"
                                                       class="form-control text-white" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 3 -->
                                </div> <!-- end 3rd row -->

                                <!-- start 5th row -->
                                <div class="row bb-1 border-warning">
                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <h5>Tags English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products->tags_eng}}" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <h5>Tags Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products->tags_bng}}" readonly>
                                            </div>
                                        </div>
                                    </div><!-- end col md 4 -->

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <h5>Size English </h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products->size_eng}}" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 4 -->
                                </div><!-- end 5th row -->

                                <!-- start 6th row -->
                                <div class="row bb-1 border-warning">
                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <h5>Size Bangla</h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products->tags_bng}}" readonly>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <h5>Color English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products->color_eng}}" readonly>

                                            </div>
                                        </div>
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <h5>Color Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" class="form-control text-white"
                                                       value="{{$products->color_bng}}" readonly>

                                            </div>
                                        </div>
                                    </div> <!-- end col md 4 -->
                                </div> <!-- end 6th row -->

                                <!-- start 7th row -->
                                <div class="row bb-1 border-warning">
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <h5>Short Description English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <p class="form-control text-white" readonly>
                                                    {!! $products->short_description_eng !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <p class="form-control text-white" readonly>
                                                    {!! $products->short_description_bng !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 6 -->
                                </div> <!-- end 7th row -->

                                <!-- start 8th row -->
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <h5>Long Description English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <p class="form-control text-white"  readonly="">
                                                    {{ strip_tags($products->long_description_eng) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <h5>Long Description Bangla <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <p class="form-control text-white"  readonly="">
                                                    {{ strip_tags($products->long_description_bng) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 6 -->
                                </div> <!-- end 8th row -->
                                <hr>

                                <!-- start 9th row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox"
                                                           value="1"
                                                           {{$products->hot_deals === 1 ? 'checked':''}} readonly>
                                                    <label>Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox"
                                                           value="1"
                                                           {{$products->featured === 1 ? 'checked':''}} readonly>
                                                    <label>Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox"
                                                           value="1"
                                                           {{$products->special_offer === 1 ? 'checked':''}} readonly>
                                                    <label>Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox"
                                                           value="1"
                                                           {{$products->special_deals === 1 ? 'checked':''}} readonly>
                                                    <label>Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col md 6 -->
                                </div>
                                <!-- end 9th row -->
                            </div>
                            <!-- /.col-12 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

        <!-- =========== Image updating content ============ -->
        <!-- Image content -->
        <section class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="box bt-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Product Images</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group-lg row">
                                @foreach($multipleImages as $image)
                                    <div class="col-md-3">
                                        <div class="card bg-lightest">
                                            <div class="box-body ">
                                                <img src="{{asset($image->photo_name) }}" class="card-img"
                                                     style="height: 130px; width: 250px;">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section> <!-- /.Image content -->

        <!-- =========== Cover Thumbnail Image updating content ============ -->
        <!-- Cover Thumbnail content -->
        <section class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="box bt-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Product Thumbnail Image</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group-lg row">
                                <div class="col-md-4">
                                    <div class="card bg-lightest">
                                        <div class="box-body ">
                                            <img src="{{asset($products->product_thumbnail) }}" class="card-img"
                                                 style="height: 200px; width: 250px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- /.Cover Thumbnail content -->

    </div>
    <!-- /.content-wrapper -->
@endsection




