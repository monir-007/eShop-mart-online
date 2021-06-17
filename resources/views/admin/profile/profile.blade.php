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
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-gradient-secondary">
                                    <h3 class="widget-user-username text-light">{{$adminData->name}}</h3>
                                    <h6 class="widget-user-desc text-light">{{$adminData->email}}</h6>
                                    <a href="{{route('admin.profile.update')}}" class="btn btn-rounded btn-success float-right mb-5">Update Profile</a>
                                </div>
                                <div class="widget-user-image">
                                    <img class="rounded-circle"
                                         src="{{ (!empty($adminData->profile_photo_path))
                                    ? url('images/upload/admin-user/'.$adminData->profile_photo_path)
                                    : url('images/upload/no_image.jpg') }}"
                                         alt="User Avatar">
                                </div>
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">12K</h5>
                                                <span class="description-text">FOLLOWERS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 br-1 bl-1">
                                            <div class="description-block">
                                                <h5 class="description-header">550</h5>
                                                <span class="description-text">FOLLOWERS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">158</h5>
                                                <span class="description-text">TWEETS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content -->

@endsection

