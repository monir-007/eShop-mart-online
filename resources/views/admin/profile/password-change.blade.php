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
                                <li class="breadcrumb-item active" aria-current="page">Change password</li>
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
                            <h4 class="box-title">Admin | Change password</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="{{ route('admin.update.password') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Current password <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="password" name="oldPassword"
                                                                       id="current_password"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>New password <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="password" name="password" id="password"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Confirm password <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="password" name="password_confirmation"
                                                                       id="password_confirmation"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-info">Update
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


@endsection
