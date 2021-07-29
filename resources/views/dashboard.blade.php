@extends('user-view.layouts.app')
@section('title')
    Dashboard Profile
@endsection
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user-view.layouts.components._user-sidebar')
                <div class="col-md-2"> </div> <!-- end col-md-2 -->
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">Welcome..... <strong>{{Auth::user()->name}}</strong> </h3>
                    </div>
                </div> <!-- end col-md-6 -->
            </div><!-- end row -->

        </div>
    </div>

@endsection
