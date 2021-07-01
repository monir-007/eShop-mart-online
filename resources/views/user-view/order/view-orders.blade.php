@extends('user-view.layouts.app')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user-view.layouts.components._user-sidebar')
                <div class="col-md-2"></div> <!-- end col-md-2 -->
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">Welcome..... <strong>{{Auth::user()->name}}</strong> Update your profile
                        </h3>

                        <div class="card-body sign-in-page" style="margin-bottom: 30px">

                        </div>
                    </div>
                </div> <!-- end col-md-6 -->
            </div><!-- end row -->

        </div>
    </div>

@endsection
