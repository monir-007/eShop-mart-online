<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $adminData = Admin::find(1);
        return view('admin.profile.profile', compact('adminData'));
    }

    public function update()
    {
        $updateData = Admin::find(1);
        return view('admin.profile.update', compact('updateData'));
    }

    public function store(Request $request)
    {
        $storeData = Admin::find(1);
        $storeData->name = $request->name;
        $storeData->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('images/upload/admin-user/' . $storeData->profile_photo_path));
            $fileName = date('Y-m-d-') . $file->getClientOriginalName();
            $file->move(public_path('images/upload/admin-user'), $fileName);
            $storeData['profile_photo_path'] = $fileName;
        }
        $storeData->save();
        return redirect()->route('admin.profile');
    }
}
