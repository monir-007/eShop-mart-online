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
