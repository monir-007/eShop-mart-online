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
                                <li class="breadcrumb-item active" aria-current="page">Edit Product Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box bt-3 border-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Product</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" action="{{route('blog.post.update',$blogPost->id)}}">
                                    @csrf
{{--                                    <input type="hidden" name="id" value="{{$blogPost->id}}">--}}

                                    <!-- start 1st row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required>
                                                        <option value="" selected="" disabled="">Select Brand</option>
                                                        @foreach($blogCategory as $category)
                                                            <option
                                                                value="{{ $category->id }}" {{ $category->id === $blogPost->category_id ? 'selected':'' }}> {{$category->name_eng}} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                    </div><!-- end 1st row -->

                                    <!-- start 2nd row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Title English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title_eng" value="{{$blogPost->title_eng}}"
                                                           class="form-control" required>
                                                    @error('title_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Name Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title_bng" value="{{$blogPost->title_bng}}"
                                                           class="form-control" required>
                                                    @error('title_bng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 2nd row -->
                                    <hr>
                                    <!-- start 8th row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
	                                                <textarea id="editor1" name="details_eng" rows="10"
                                                              cols="80" required>
		                                                {{$blogPost->details_eng}}
						                            </textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="details_bng" rows="10"
                                                              cols="80" required>
                                                         {{$blogPost->details_bng}}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->
                                    </div> <!-- end 8th row -->
                                    <hr>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-outline-warning float-right"
                                               value="Update Product">
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

        <!-- =========== Post Cover Image updating content ============ -->
        <!-- Cover content -->
        <section class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="box bt-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Post Cover Image <strong>Update</strong></h4>
                        </div>
                        <div class="box-body">
                            <form method="post" action="{{route('blog.post.cover.update')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$blogPost->id}}">
                                <input type="hidden" name="oldImage" value="{{$blogPost->post_image}}">

                                <div class="form-group-lg row">
                                    <div class="col-md-4">
                                        <div class="card bg-lightest">
                                            <div class="box-body ">
                                                <img src="{{asset($blogPost->post_image) }}" class="card-img"
                                                     style="height: 200px; width: 250px;">
                                            </div>
                                            <div class="card-body">
                                                <div class="card-text">
                                                    <div class="form-group">
                                                        <h5 class="text-white">Change Image <span
                                                                class="text-danger">*</span></h5>
                                                        <div class="controls ">
                                                            <input type="file" name="post_image"
                                                                   class="form-control bg-lightest"
                                                                   onchange="coverThamUrl(this)" required>
                                                            @error('post_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-warning btn-outline text-white"
                                                           value="Update Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 card-body">
                                        <img src="" id="coverThumbnail" class="card-img">
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </section> <!-- /.Cover content -->


    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')

    <script type="text/javascript">
        function coverThamUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#coverThumbnail').attr('src', e.target.result).width(200).height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection



