<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponShow()
    {
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('admin.coupon.manage-coupons', compact('coupons'));
    }
}
