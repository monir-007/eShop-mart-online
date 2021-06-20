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
                                <li class="breadcrumb-item" aria-current="page">Subcategory</li>
                                <li class="breadcrumb-item active" aria-current="page">Sub list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-around">

                <!-- =============== Add New Brand ================== -->
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Edit Sub|Subcategory: <span class="text-secondary">{{$subsubcategories->name_eng}}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('sub-subcategory.update',$subsubcategories->id) }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$subsubcategories->id}}">

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected': ''}} >{{ $category->name_eng }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Subcategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Subcategory</option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategories->subcategory_id ? 'selected': ''}} >{{ $subcategory->name_eng }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5> Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name_eng" value="{{$subsubcategories->name_eng}}"
                                                   class="form-control">
                                            @error('name_eng')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Name Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name_bng" value="{{$subsubcategories->name_bng}}" class="form-control">
                                            @error('name_bng')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Update">
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
