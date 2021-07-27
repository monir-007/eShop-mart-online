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
                            <h4 class="box-title text-white">Admin | SEO Setting</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('update.seo.setting') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $SEO->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Meta Title <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="meta_title"
                                                                       value="{{$SEO->meta_title}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Meta Author<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="meta_author"
                                                                       value="{{$SEO->meta_author}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Meta Keyword<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="meta_keyword"
                                                                       value="{{$SEO->meta_keyword}}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Meta Description<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <textarea name="meta_description" id="textarea" cols="20"
                                                                          rows="4" placeholder="write description" class="form-control">{{$SEO->meta_description}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Google Analytics<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <textarea name="google_analytics" id="textarea" cols="20"
                                                                          rows="4" placeholder="write description" class="form-control">{{$SEO->google_analytics}}</textarea>
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
