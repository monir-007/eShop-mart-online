<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('user-view.index');
    }

    public function userLogout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'User logged out.',
            'alert-type' => 'warning'
        );
        return redirect()->route('login')->with($notification);
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user-view.profile.update-profile', compact('user'));
    }

    public function UserStore(Request $request)
    {
        $storeData = User::find(Auth::user()->id);
        $storeData->name = $request->name;
        $storeData->email = $request->email;
        $storeData->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('images/upload/users/' . $storeData->profile_photo_path));
            $fileName = date('Y-m-d-') . $file->getClientOriginalName();
            $file->move(public_path('images/upload/users'), $fileName);
            $storeData['profile_photo_path'] = $fileName;
        }
        $storeData->save();

        $notification = array(
            'message' => 'Profile Updated Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function userChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user-view.profile.change-password', compact('user'));
    }

    public function userUpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password,$hashedPassword)) {
            $newPassword = User::find(Auth::id());
            $newPassword->password = Hash::make($request->password);
            $newPassword->save();
            Auth::logout();

            return redirect()->route('user.logout');
        }

        $notification = array(
            'message' => 'Password invalid.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
