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
                                <li class="breadcrumb-item active" aria-current="page">Blog Category list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box bt-3 border-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Blog Category List</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Blog Category English</th>
                                        <th>Blog Category Bangla</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($blogCategory as $item)
                                            <td>{{$item->name_eng}}</td>
                                            <td>{{$item->name_bng}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('blog.category.edit',$item->id)}}"
                                                   class="btn btn-success mr-2"
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Edit"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ route('blog.category.delete',$item->id) }}" id="delete"
                                                   class="btn btn-danger" data-toggle="tooltip"
                                                   data-placement="bottom" title="Remove"> <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <!-- =============== Add New Blog Category ================== -->
                <div class="col-4">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Add New Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('blog.category.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5> Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name_eng" class="form-control">
                                            @error('name_eng')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Name Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name_bng" class="form-control">
                                            @error('name_bng')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Add New">
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



