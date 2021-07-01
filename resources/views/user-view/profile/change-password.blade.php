@extends('user-view.layouts.app')
@section('content')

    <div class="body-content ">
        <div class="container">
            <div class="row mb-2">
                @include('user-view.layouts.components._user-sidebar')

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
