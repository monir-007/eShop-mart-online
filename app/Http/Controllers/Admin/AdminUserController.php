<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function adminRoleManage()
    {
        $adminUser = Admin::where('type', 2)->latest()->get();
        return view('admin.role.admin-role-manage-all', compact('adminUser'));
    }

    public function addNewAdmin()
    {
        return view('admin.role.add-new-admin');
    }

    public function addNewAdminStore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Input admin Name',
            'email.required' => 'Input User email',
            'password.required' => 'Input user password',
            'phone.required' => 'Input user phone number',
        ]);

        $image = $request->file('profile_photo_path');
        $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('images/upload/admin-user/' . $nameGenarate);
        $saveUrl = 'images/upload/admin-user/' . $nameGenarate;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'stock' => $request->stock,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'orders' => $request->orders,
            'return_order' => $request->return_order,
            'product_review' => $request->product_review,
            'reports' => $request->reports,
            'blog' => $request->blog,
            'allUser' => $request->allUser,
            'slider' => $request->slider,
            'settings' => $request->settings,
            'admin_user_role' => $request->admin_user_role,
            'type' => 2,
            'profile_photo_path' => $saveUrl,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Admin user added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.user.all')->with($notification);
    }

    public function adminUserEdit($id)
    {
        $adminUser = Admin::findOrFail($id);
        return view('admin.role.admin-user-edit', compact('adminUser'));
    }

    public function adminUserUpdate(Request $request)
    {
        $adminId = $request->id;
        $oldImg = $request->oldImage;

        if ($request->file('profile_photo_path')) {

            unlink($oldImg);
            $image = $request->file('profile_photo_path');
            $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('images/upload/admin-user/' . $nameGenarate);
            $saveUrl = 'images/upload/admin-user/' . $nameGenarate;

            Admin::findOrFail($adminId)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'stock' => $request->stock,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'orders' => $request->orders,
                'return_order' => $request->return_order,
                'product_review' => $request->product_review,
                'reports' => $request->reports,
                'blog' => $request->blog,
                'allUser' => $request->allUser,
                'slider' => $request->slider,
                'settings' => $request->settings,
                'admin_user_role' => $request->admin_user_role,
                'type' => 2,
                'profile_photo_path' => $saveUrl,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('admin.user.all')->with($notification);

        }

        Admin::findOrFail($adminId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'stock' => $request->stock,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'orders' => $request->orders,
            'return_order' => $request->return_order,
            'product_review' => $request->product_review,
            'reports' => $request->reports,
            'blog' => $request->blog,
            'allUser' => $request->allUser,
            'slider' => $request->slider,
            'settings' => $request->settings,
            'admin_user_role' => $request->admin_user_role,
            'type' => 2,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.user.all')->with($notification); // end else
    }

    public function adminUserDelete($id)
    {
        $adminImg = Admin::findOrFail($id);
        $image = $adminImg->profile_photo_path;
        unlink($image);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }
}
