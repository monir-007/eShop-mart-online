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
                                <li class="breadcrumb-item active" aria-current="page">New Blog Post Page</li>
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
                        <h3 class="box-title">Add New Blog Post</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" action="{{route('blog.post.store')}}" enctype="multipart/form-data">
                                @csrf
                                <!-- start 1st row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Title English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title_eng" class="form-control" required>
                                                    @error('title_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Title Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title_bng" class="form-control" required>
                                                    @error('title_bng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 2nd row -->


                                    <!-- start 4th row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Blog Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <select name="category_id" class="form-control" required>
                                                            <option value="" selected="" disabled="">Select Category
                                                            </option>
                                                            @foreach($blogCategory as $category)
                                                                <option
                                                                    value="{{$category->id}}">{{$category->name_eng}}</option>
                                                            @endforeach
                                                        </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <h5>Post Cover Image<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="post_image"
                                                           onchange="coverThamUrl(this)" class="form-control" required>
                                                    @error('post_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div>
                                                        <img id="coverTham" src="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->

                                    </div> <!-- end 4th row -->

                                    <!-- start 8th row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Details English <span class="text-danger">*</span></h5>
                                                <div class="controls">
	                                                <textarea id="editor1" name="details_eng" rows="10"
                                                              cols="80" placeholder="write post details in english" required>
						                            </textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Details Bangla <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="details_bng" rows="10"
                                                              cols="80" placeholder="write post details in bangla" required>

                                                    </textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col md 6 -->
                                    </div> <!-- end 8th row -->

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary float-right"
                                               value="Add Post">
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

@endsection



