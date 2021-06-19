@extends('user-view.layouts.app')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top" style="border-radius:50%"
                         src="{{ (!empty($user->profile_photo_path))?url('images/upload/users/'.$user->profile_photo_path):url('images/upload/no_image.jpg') }}"
                         alt="profile image" height="100%" width="100%"><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>

                    </ul>
                </div><!-- end col-md-2 -->

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
