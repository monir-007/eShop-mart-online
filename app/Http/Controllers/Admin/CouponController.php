<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    public function couponShow()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('admin.coupon.manage-coupons', compact('coupons'));
    }

    public function couponStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'validity' => 'required',
        ]);

        Coupon::insert([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Mew Coupon added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
