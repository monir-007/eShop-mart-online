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
                                <li class="breadcrumb-item active" aria-current="page">Slider list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- =============== Add New Slider ================== -->
                <div class="col-8">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Add New Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('slider.update', $sliders->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$sliders->id}}">
                                    <input type="hidden" name="oldImage" value="{{$sliders->image}}">
                                    <div class="form-group">
                                        <h5>Slider Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" value="{{$sliders->title}}"
                                                   class="form-control bg-lightest text-white">
                                            @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" class="form-control bg-lightest text-white" cols="10"
                                                      rows="4">{{$sliders->description}}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>Change Image <span class="text-danger">*</span></h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="{{asset($sliders->image) }}" class="card-img"
                                                             style="height: 200px; width: 250px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img src="" id="sliderImage" class="card-img" >
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="controls ">
                                                <input type="file" name="image"
                                                       class="form-control bg-lightest col-md-8"
                                                       onchange="titleImage(this)" required>
                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Update Slider">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript">
        function titleImage(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#sliderImage').attr('src', e.target.result).width(250).height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

