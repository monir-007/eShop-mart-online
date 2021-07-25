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
                                <li class="breadcrumb-item active" aria-current="page">Report list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Search Report -->
                <div class="col-4">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Search by Date</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search-by.date') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Select Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date"
                                                   class="form-control">
                                            @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Report -->

                <!-- Search Report -->
                <div class="col-4">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Search by Month</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search-by.month') }}" >
                                    @csrf
                                    <div class="form-group">
                                        <h5> Select Month<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="month" class="form-control" id="">
                                                <option label="Choose One"></option>
                                                <option Value="January">January</option>
                                                <option Value="February">February</option>
                                                <option Value="March">March</option>
                                                <option Value="April">April</option>
                                                <option Value="May">May</option>
                                                <option Value="June">June</option>
                                                <option Value="July">July</option>
                                                <option Value="August">August</option>
                                                <option Value="September">September</option>
                                                <option Value="October">October</option>
                                                <option Value="November">November</option>
                                                <option Value="December">December</option>
                                            </select>

                                            @error('month')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5> Select Year<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year_name" class="form-control" id="">
                                                <option label="Choose One"></option>
                                                <option Value="2018">2018</option>
                                                <option Value="2019">2019</option>
                                                <option Value="2020">2020</option>
                                                <option Value="2021">2021</option>
                                                <option Value="2022">2022</option>
                                                <option Value="2023">2023</option>
                                                <option Value="2024">2024</option>
                                                <option Value="2025">2025</option>
                                                <option Value="2026">2026</option>
                                            </select>

                                            @error('year_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Report -->

                <!-- Search Report -->
                <div class="col-4">
                    <div class="box bt-3">
                        <div class="box-header with-border">
                            <h3 class="box-title text-white">Search by Year</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('search-by.year') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5> Select Year<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year" class="form-control" id="">
                                                <option label="Choose One"></option>
                                                <option Value="2018">2018</option>
                                                <option Value="2019">2019</option>
                                                <option Value="2020">2020</option>
                                                <option Value="2021">2021</option>
                                                <option Value="2022">2022</option>
                                                <option Value="2023">2023</option>
                                                <option Value="2024">2024</option>
                                                <option Value="2025">2025</option>
                                                <option Value="2026">2026</option>
                                            </select>

                                            @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-rounded btn-primary float-right"
                                           value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Report -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



