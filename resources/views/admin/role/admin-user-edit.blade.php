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
                                <li class="breadcrumb-item active" aria-current="page">Edit Admin User</li>
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
                            <h4 class="box-title">Admin | Edit User</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('update.admin.user')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{$adminUser->id}}">
                                        <input type="hidden" name="oldImage" value="{{$adminUser->profile_photo_path}}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Admin User Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name"
                                                                       value="{{$adminUser->name}}"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Admin User Email <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email"
                                                                       value="{{$adminUser->email}}"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Admin User Phone <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone"
                                                                       value="{{$adminUser->phone}}"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Admin User Image</h5>
                                                            <div class="controls">
                                                                <input type="file" name="profile_photo_path" id="image"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 justify-content-center">
                                                        <img id="showImage"
                                                             src="{{asset($adminUser->profile_photo_path)}}"
                                                             alt="" class="w-100 h-100 rounded ">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_1"
                                                                           name="brand"
                                                                           value="1" {{$adminUser->brand===1 ? 'checked':''}}>
                                                                    <label for="checkbox_1">Brand</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_2"
                                                                           name="category"
                                                                           value="1" {{$adminUser->category===1 ? 'checked':''}}>
                                                                    <label for="checkbox_2">Category</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_3"
                                                                           name="product"
                                                                           value="1" {{$adminUser->product===1 ? 'checked':''}}>
                                                                    <label for="checkbox_3">Product Manage</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_4"
                                                                           name="stock"
                                                                           value="1" {{$adminUser->stock===1 ? 'checked':''}}>
                                                                    <label for="checkbox_4">Stock</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_5"
                                                                           name="coupons"
                                                                           value="1" {{$adminUser->coupons===1 ? 'checked':''}}>
                                                                    <label for="checkbox_5">Coupons</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_6"
                                                                           name="shipping"
                                                                           value="1" {{$adminUser->shipping===1 ? 'checked':''}}>
                                                                    <label for="checkbox_6">Shipping Details</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_7"
                                                                           name="orders"
                                                                           value="1" {{$adminUser->orders===1 ? 'checked':''}}>
                                                                    <label for="checkbox_7">Orders Manage</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_8"
                                                                           name="return_order"
                                                                           value="1" {{$adminUser->return_order===1 ? 'checked':''}}>
                                                                    <label for="checkbox_8">Return Order Manage</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_9"
                                                                           name="product_review"
                                                                           value="1" {{$adminUser->product_review===1 ? 'checked':''}}>
                                                                    <label for="checkbox_9">Product Review</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_10"
                                                                           name="reports"
                                                                           value="1" {{$adminUser->reports===1 ? 'checked':''}}>
                                                                    <label for="checkbox_10">Reports Manage</label>
                                                                </fieldset>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col md 4 -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_11"
                                                                           name="blog"
                                                                           value="1" {{$adminUser->blog===1 ? 'checked':''}}>
                                                                    <label for="checkbox_11">Blog Post</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_12"
                                                                           name="allUser"
                                                                           value="1" {{$adminUser->allUser===1 ? 'checked':''}}>
                                                                    <label for="checkbox_12">All User List</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_13"
                                                                           name="slider"
                                                                           value="1" {{$adminUser->slider===1 ? 'checked':''}}>
                                                                    <label for="checkbox_13">Home Slider</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_14"
                                                                           name="settings"
                                                                           value="1" {{$adminUser->settings===1 ? 'checked':''}}>
                                                                    <label for="checkbox_14">Site Settings</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_15"
                                                                           name="admin_user_role"
                                                                           value="1" {{$adminUser->admin_user_role===1 ? 'checked':''}}>
                                                                    <label for="checkbox_15">Admin User Role</label>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col md 4 -->
                                                </div>
                                                <hr>
                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-info"
                                                           value="Update Admin">
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
