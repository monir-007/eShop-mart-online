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

                <div class="col-md-2"></div> <!-- end col-md-2 -->
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">Welcome..... <strong>{{Auth::user()->name}}</strong> Update your profile
                        </h3>

                        <div class="card-body sign-in-page" style="margin-bottom: 30px">
                            <form action="{{route('user.profile.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="name">Name <span>*</span></label>
                                    <input type="text" name="name" id="name" value="{{$user->name}}"
                                           class="form-control unicase-form-control text-input" required>
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email">Email Address <span>*</span></label>
                                    <input type="email" name="email" id="email" value="{{$user->email}}"
                                           class="form-control unicase-form-control text-input" required>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                    <input type="text" name="phone" id="phone" value="{{$user->phone}}"
                                           class="form-control unicase-form-control text-input" required>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="profile_photo_path">Profile Image <span>*</span></label>
                                    <input type="file" name="profile_photo_path" id="profile_photo_path"
                                           class="form-control unicase-form-control text-input" required>
                                </div>
                                <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Update</button>

                            </form>
                        </div>
                    </div>
                </div> <!-- end col-md-6 -->
            </div><!-- end row -->

        </div>
    </div>

@endsection
