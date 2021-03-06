<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('admin/images/favicon.ico')}}">

    <title>shopMart Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('admin/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/skin_color.css ')}}">

    @yield('style')

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    <!-- Header Navbar -->
@include('admin.layouts.components._header')

<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar-->
        <section class="sidebar">

            <div class="user-profile">
                <div class="ulogo">
                    <a href="{{url('admin/dashboard')}}">
                        <!-- logo for regular state and mobile devices -->
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('admin/images/logo-dark.png')}}" alt="">
                            <h3><b>shopMart</b> Admin</h3>
                        </div>
                    </a>
                </div>
            </div>

            <!-- sidebar menu-->
            @include('admin.layouts.components._sidebar-menu')
        </section>

        <div class="sidebar-footer">
            <!-- item-->
            <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
               aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
            <!-- item-->
            <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                    class="ti-email"></i></a>
            <!-- item-->
            <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                    class="ti-lock"></i></a>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('admin-index')
    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
@include('admin.layouts.components._footer')



<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{asset('admin/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
<!-- Toastr tags-->
<script src="{{asset('assets/vendor_components/toastr/toastr.min.js')}}"></script>
<!-- Datatables tags-->
<script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('admin/js/pages/data-table.js')}}"></script>

<script src="{{asset('admin/js/pages/dashboard.js')}}"></script>
<!-- Tag input tags-->
<script src="{{asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
<!-- CK Editor tags-->
<script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
<script src="{{ asset('admin/js/pages/editor.js') }}"></script>
<!-- Sunny Admin App -->
<script src="{{asset('admin/js/template.js')}}"></script>


@yield('script')

{{--Notifications Alert--}}
<script>
    @if(Session::has('message'))
    const type = "{{ Session::get('alert-type','success') }}";
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>

<script src="{{asset('user-view/assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin/js/code.js')}}"></script>

<script type="text/javascript">
    $(function () {
        $(document).on('click', '#inactive', function (e) {
            e.preventDefault();
            let link = $(this).attr("href");

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to deactivate this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#12C684',
                cancelButtonColor: '#B0103C',
                confirmButtonText: 'Yes, inactive it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deactivated!',
                        'Your file has been deactivated.',
                        'success'
                    )
                }
            })
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $(document).on('click', '#active', function (e) {
            e.preventDefault();
            let link = $(this).attr("href");

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to activate this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#12C684',
                cancelButtonColor: '#B0103C',
                confirmButtonText: 'Yes, active it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Activated!',
                        'Your file has been activated.',
                        'success'
                    )
                }
            })
        });
    });
</script>

</body>
</html>
