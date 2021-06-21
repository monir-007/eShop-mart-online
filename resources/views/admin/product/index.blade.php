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
                                <li class="breadcrumb-item active" aria-current="page">New Product Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box bt-3 border-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Product</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                    @csrf

                                    <!-- start 1st row -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select Brand</option>
                                                        @foreach($brands as $brand)
                                                            <option
                                                                value="{{ $brand->id }}">{{ $brand->name_eng }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 3 -->

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{ $category->id }}">{{ $category->name_eng }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 3 -->

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select Subcategory
                                                        </option>

                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 3 -->

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Sub|Subcategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select Sub|subCategory
                                                        </option>
                                                    </select>
                                                    @error('subsubcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 3 -->
                                    </div><!-- end 1st row -->

                                    <!-- start 2nd row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Name English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name_eng" class="form-control" required>
                                                    @error('name_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Name Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name_bng" class="form-control" required>
                                                    @error('name_bng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="code" class="form-control" required>
                                                    @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 2nd row -->

                                    <!-- start 3rd row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="quantity" class="form-control" required>
                                                    @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control" required>
                                                    @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Discount Price</h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control">
                                                    @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 3rd row -->

                                    <!-- start 4th row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Cover Thumbnail <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="product_thumbnail"
                                                           onchange="coverThamUrl(this)" class="form-control" required>
                                                    @error('product_thumbnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div>
                                                        <img id="coverTham" src="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Images <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" id="multipleImage" name="multipleImage[]"
                                                           multiple class="form-control" required>
                                                    @error('multipleImage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="row" id="previewImage">

                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->
                                    </div> <!-- end 4th row -->

                                    <!-- start 5th row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Tags English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="tags_eng" class="form-control"
                                                           value="Lorem,Ipsum,Amet" data-role="tagsinput" required>
                                                    @error('tags_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Tags Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="tags_bng" class="form-control"
                                                           value="Lorem,Ipsum,Amet" data-role="tagsinput" required>
                                                    @error('tags_bng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Size English </h5>
                                                <div class="controls">
                                                    <input type="text" name="size_eng" class="form-control"
                                                           value="Small,Midium,Large" data-role="tagsinput">
                                                    @error('size_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div><!-- end 5th row -->

                                    <!-- start 6th row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Size Bangla</h5>
                                                <div class="controls">
                                                    <input type="text" name="size_bng" class="form-control"
                                                           value="Small,Midium,Large" data-role="tagsinput">
                                                    @error('size_bng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Color English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="color_eng" class="form-control"
                                                           value="red,Black,Amet" data-role="tagsinput" required>
                                                    @error('color_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Color Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls bg-secondary">
                                                    <input type="text" name="color_bng" class="form-control"
                                                           value="red,Black,Large" data-role="tagsinput" required>
                                                    @error('color_bng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 6th row -->

                                    <!-- start 7th row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_description_eng" id="textarea"
                                                              class="form-control"
                                                              required placeholder="Textarea text"></textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_description_bng" id="textarea"
                                                              class="form-control"
                                                              required placeholder="Textarea text"></textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->
                                    </div> <!-- end 7th row -->

                                    <!-- start 8th row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
	                                                <textarea id="editor1" name="long_description_eng" rows="10"
                                                              cols="80" required>
		                                                Long Description English
						                            </textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="long_description_bng" rows="10"
                                                              cols="80" required>
                                                        Long Description Bangla
                                                    </textarea>
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
                                                        <input type="checkbox" id="checkbox_1" name="hot_deals"
                                                               value="1">
                                                        <label for="checkbox_1">Hot Deals</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="featured"
                                                               value="1">
                                                        <label for="checkbox_2">Featured</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="special_offer"
                                                               value="1">
                                                        <label for="checkbox_3">Special Offer</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="special_deals"
                                                               value="1">
                                                        <label for="checkbox_4">Special Deals</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col md 6 -->
                                    </div>
                                    <!-- end 9th row -->
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary float-right"
                                               value="Add Product">
                                    </div>
                                </form>
                                <!-- /.end form -->

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
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategories') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subsubcategory_id"]').html('');
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.name_eng + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="subcategory_id"]').on('change', function () {
                let subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{  url('/category/sub-subcategories') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.name_eng + '</option>');
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
        function coverThamUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#coverTham').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>

        $(document).ready(function () {
            $('#multipleImage').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    let data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) {    //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {    //check supported file type
                            let fRead = new FileReader();     //new filereader
                            fRead.onload = (function (file) {    //trigger function on successful read
                                return function (e) {
                                    let img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#previewImage').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
@endsection



