<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('admin/images/favicon.ico')}}">

    <title>shopMart - Log in </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('admin/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/skin_color.css')}}">

</head>
<body class="hold-transition theme-primary bg-gradient-warning-dark">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="content-top-agile p-10">
                        <h2 class="text-white">Get started with Us</h2>
                        <p class="text-white-50">Sign in to start your session</p>
                    </div>
                    <div class="p-30 rounded30 box-shadowed b-1 ">
                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="email" id="email" name="email"
                                           class="form-control pl-15 bg-transparent text-white plc-white"
                                           :value="old('email')" placeholder="Email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-transparent text-white"><i
                                                class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" id="password" name="password" required
                                           autocomplete="current-password"
                                           class="form-control pl-15 bg-transparent text-white plc-white"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox text-white">
                                        <input type="checkbox" id="remember_me" name="remember">
                                        <label for="remember_me">Remember Me</label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <div class="fog-pwd text-right">
                                        @if(Route::has('password.request'))
                                            <a href="{{route('password.request')}}" class="text-white hover-warning"><i
                                                    class="ion ion-locked"></i> Forgot password?</a>
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <div class="text-center text-white">
                            <p class="mt-20">- Sign With -</p>
                            <p class="gap-items-2 mb-20">
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-facebook"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-twitter"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-google-plus"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                        class="fa fa-instagram"></i></a>
                            </p>
                        </div>

                        <div class="text-center">
                            <p class="mt-15 mb-0 text-white">Don't have an account?
                                <a href="auth_register.html" class="text-warning ml-5">
                                    Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS -->
<script src="{{asset('admin/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>

</body>
</html>
