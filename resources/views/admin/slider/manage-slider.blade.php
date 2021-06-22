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
                <div class="col-12">
                    <div class="box bt-3 border-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Slider List</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($sliders as $item)
                                            <td><img src="{{asset($item->image)}}" alt=""
                                                     style="width: 70px; height: 40px;"></td>
                                            <td>
                                                @if($item->title===null)
                                                    <span class="text-warning">No Title</span>
                                                @else
                                                    {{$item->title}}
                                                @endif
                                            </td>
                                            <td>{{$item->description}}</td>
                                            <td>
                                                @if($item->status === 1)
                                                    <span class="badge badge-pill badge-success"> Active </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> InActive </span>
                                                @endif
                                            </td>

                                            <td class="d-flex">
                                                <a href="{{route('slider.edit',$item->id)}}" class="btn btn-success mr-2 "
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Edit"> <i class="fa fa-edit"></i> </a>

                                                @if($item->status===1)
                                                    <a href="{{route('slider.inactive',$item->id)}}"
                                                       class="btn btn-warning btn-circle mr-2" id="inactive"
                                                       data-toggle="tooltip"
                                                       data-placement="bottom" title="deactivate slider"> <i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{route('slider.active',$item->id)}}"
                                                       class="btn btn-info btn-circle mr-2" id="active"
                                                       data-toggle="tooltip"
                                                       data-placement="bottom" title="Active slider"> <i
                                                            class="fa fa-arrow-up"></i></a>

                                                @endif

                                                <a href="{{ route('slider.delete',$item->id) }}" id="delete"
                                                   class="btn btn-danger mr-2" data-toggle="tooltip"
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
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
