<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);
        if ($product->discount === null) {
            Cart::add([
                'id' => '293ad',
                'name' => $request->productName,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'image' => $product->product_thumbnail,
                ]
            ]);
            return response()->json(['success' => 'Successfully added to your cart.']);
        }

        Cart::add([
            'id' => '293ad',
            'name' => $request->productName,
            'qty' => $request->quantity,
            'price' => $product->discount_price,
            'weight' => 1,
            'options' => [
                'size' => $request->size,
                'color' => $request->color,
                'image' => $product->product_thumbnail,
            ]
        ]);
        return response()->json(['success' => 'Successfully added to your cart.']);
    }

    public function addToMiniCart()
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

    public function RemoveProductMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Removed from Cart']);
    }

    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('name', $request->couponCode)->where('validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            $total = Cart::total();
            $discountAmount =($total * $coupon->discount / 100) ;
            Session::put('coupon', [
                'name' => $coupon->name,
                'discount' => $coupon->discount,
                'discountAmount' => round((float)$discountAmount),
                'totalAmount' => round((float)$total - $discountAmount),
            ]);
            return response()->json(['success' => 'coupon applied']);
        }
        return response()->json(['error' => 'Invalid coupon']);
    }

    public function couponCalculation()
    {
        if (Session::has('coupon')) {
            $total = Cart::total();
            return response()->json([
                'subtotal' => $total,
                'couponName' => session()->get('coupon')['name'],
                'couponDiscount' => session()->get('coupon')['discount'],
                'couponDiscountAmount' => session()->get('coupon')['discountAmount'],
                'couponTotalAmount' => session()->get('coupon')['totalAmount'],
            ]);
        }
        return response()->json([
            'total' => round((float)Cart::total(), 2),
        ]);
    }

    public function couponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'coupon removed.']);
    }

    public function checkoutIndex()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                return view('user-view.checkout.view-checkout',compact('carts','cartTotal','cartQty'));
            }
            $notification = array(
                'message' => "You haven't shopping yet.",
                'alert-type' => 'warning'
            );
            return redirect()->to('/')->with($notification);
        }
        $notification = array(
            'message' => 'You need to login.',
            'alert-type' => 'warning'
        );
        return redirect()->route('login')->with($notification);
    }


}
