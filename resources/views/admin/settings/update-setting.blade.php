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
                                <li class="breadcrumb-item active" aria-current="page">Site Info</li>
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
                            <h4 class="box-title">Admin | Site Setting</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('update.site.setting') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $setting->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Site Logo <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="file" name="logo"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Phone One <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone_one"
                                                                       value="{{$setting->phone_one}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Phone Two <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone_two"
                                                                       value="{{$setting->phone_two}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Email <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email"
                                                                       value="{{$setting->email}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Company Name <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="company_name"
                                                                       value="{{$setting->company_name}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Company Address<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="company_address"
                                                                       value="{{$setting->company_address}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="bb-1 text-white">Social Links</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Facebook<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="facebook"
                                                                       value="{{$setting->facebook}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Twitter<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="twitter"
                                                                       value="{{$setting->twitter}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Linkedin<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="linkedin"
                                                                       value="{{$setting->linkedin}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Youtube<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="youtube"
                                                                       value="{{$setting->youtube}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                                           value="Update">
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


@endsection
