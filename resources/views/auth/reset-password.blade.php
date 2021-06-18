@extends('user-view.layouts.app')
@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class='active'>Reset password</li>
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
                        <h4 class="">Reset Password</h4>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}"
                              class="register-form outer-top-xs">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" id="email" :value="old('email', $request->email)"
                                       class="form-control unicase-form-control text-input" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" name="password" id="password"
                                       class="form-control unicase-form-control text-input"
                                       required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control unicase-form-control text-input"
                                       required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button"> Reset Password </button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            @include('user-view.layouts.components._brands')
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
