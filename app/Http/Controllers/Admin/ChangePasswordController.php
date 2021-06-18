<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function passwordChange()
    {
        return view('admin.profile.password-change');
    }

    public function passwordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->oldPassword,$hashedPassword)) {
            $newPassword = Admin::find(1);
            $newPassword->password = Hash::make($request->password);
            $newPassword->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Updated Successfully.',
                'alert-type' => 'warning'
            );
            return redirect()->route('admin.logout')->with($notification);
        }

        $notification = array(
            'message' => 'Password invalid.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
