@extends('admin.layouts.app')
@section('admin-index')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">

                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile Update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Admin | Profile update</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('admin.profile.store')}}" method="post" enctype="multipart/form-data" novalidate >
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>User Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name"
                                                                       value="{{$updateData->name}}"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>User Email <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email"
                                                                       value="{{$updateData->email}}"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Upload Image</h5>
                                                            <div class="controls">
                                                                <input type="file" name="profile_photo_path" id="image"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 justify-content-center">
                                                        <img id="showImage"
                                                             src="{{ (!empty($updateData->profile_photo_path))?url('images/upload/admin-user/'.$updateData->profile_photo_path):url('images/upload/no_image.jpg') }}"
                                                             alt="" class="w-100 h-100 rounded ">
                                                    </div>
                                                </div>

                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-info">Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>

@endsection
