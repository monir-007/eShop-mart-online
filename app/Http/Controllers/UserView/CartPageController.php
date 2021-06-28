<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function myCart()
    {
        return view('user-view.cart.view-my-cart');
    }

    public function getMyCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ]);
    }

    public function removeMyCartProduct($rowId)
    {
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        return response()->json(['success' => "Product removed from cart."]);
    }

    public function incrementMyCartProduct($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if(Session::has('coupon')){
            $couponName = Session::get('coupon')['name'];
            $coupon = Coupon::where('name',$couponName)->first();
            $total = round((float)Cart::total(), 2);
            $discountAmount = $total * $coupon->discount / 100;

            Session::put('coupon', [
                'name' => $coupon->name,
                'discount' => $coupon->discount,
                'discountAmount' => $discountAmount,
                'totalAmount' => $total - $discountAmount,
            ]);
        }
        return response()->json(['increment']);
    }

    public function decrementMyCartProduct($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if(Session::has('coupon')){
            $couponName = Session::get('coupon')['name'];
            $coupon = Coupon::where('name',$couponName)->first();
            $total = round((float)Cart::total(), 2);
            $discountAmount = $total * $coupon->discount / 100;

            Session::put('coupon', [
                'name' => $coupon->name,
                'discount' => $coupon->discount,
                'discountAmount' => $discountAmount,
                'totalAmount' => $total - $discountAmount,
            ]);
        }

        return response()->json(['decrement']);
    }


}
