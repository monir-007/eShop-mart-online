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
                                <li class="breadcrumb-item active" aria-current="page">State list</li>
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
                            <h3 class="box-title">State List</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th>Division Name</th>
                                        <th>District Name</th>
                                        <th>State Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-transparent">
                                        @foreach($shipStates as $item)
                                            <td>{{$item->division->name}}</td>
                                            <td>{{$item->district->name}}</td>
                                            <td>{{$item->name}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('state.edit',$item->id)}}"
                                                   class="btn btn-success btn-sm mr-2"
                                                   data-toggle="tooltip"
                                                   data-placement="bottom" title="Edit"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ route('state.delete',$item->id) }}" id="delete"
                                                   class="btn btn-danger btn-sm" data-toggle="tooltip"
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

                <!-- =============== Add New Brand ================== -->
                <div class="col-4">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Add New State</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('state.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Division</option>
                                                @foreach($shipDivisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>District Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" class="form-control" required >
                                                <option value="" selected="" disabled="">Select District</option>
                                                @foreach($shipDistricts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>State Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="division_id"]').on('change', function () {
                let division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{url('/shipping/manage-state')}}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="district_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection



