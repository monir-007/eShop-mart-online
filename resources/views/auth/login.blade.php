@extends('user-view.layouts.app')
@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <h5 class="">If you haven't any account.Please <span class="text-info">Sign Up</span></h5>
                        <form method="post" action="{{isset($guard) ? url($guard.'/login') : route('login')}}"
                              class="register-form outer-top-xs">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" id="email" :value="old('email')"
                                       class="form-control unicase-form-control text-input" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" name="password" id="password"
                                       class="form-control unicase-form-control text-input"
                                       required autocomplete="current-password">
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="checkbox" name="remember" id="remember_me">
                                    Remember me!
                                </label>
                                @if(Route::has('password.request'))
                                    <a href="{{route('password.request')}}" class="forgot-password pull-right">Forgot
                                        your Password?</a>
                                @endif
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>
                        <form method="post" action="{{route('register')}}" class="register-form outer-top-xs">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" name="name" :value="old('name')" class="form-control unicase-form-control text-input"
                                       id="name" autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" :value="old('email')" class="form-control unicase-form-control text-input"
                                       id="email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                <input type="text" name="phone" :value="old('phone')" class="form-control unicase-form-control text-input"
                                       id="phone" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                       id="password" autocomplete="new-password" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password
                                    <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input"
                                       id="password_confirmation" autocomplete="new-password" >
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up
                            </button>
                        </form>

                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            @include('user-view.layouts.components._brands')
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
