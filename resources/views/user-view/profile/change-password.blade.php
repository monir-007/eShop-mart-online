@extends('user-view.layouts.app')
@section('content')

    <div class="body-content ">
        <div class="container">
            <div class="row mb-2">
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
                <div class="col-md-6 ">
                    <div class="card">
                        <h3 class="text-center">Welcome..... <strong>{{Auth::user()->name}}</strong> Update your profile
                        </h3>

                        <div class="card-body sign-in-page" style="margin-bottom: 30px">
                            <form action="{{route('user.change.password.update')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="current_password">Current Password <span>*</span></label>
                                    <input type="password" name="current_password" id="current_password"
                                           class="form-control unicase-form-control text-input" autocomplete="current-password" required>
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="password">New Password <span>*</span></label>
                                    <input type="password" name="password" id="password"
                                           class="form-control unicase-form-control text-input" autocomplete="new-password" required>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control unicase-form-control text-input" autocomplete="new-password" required>
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
