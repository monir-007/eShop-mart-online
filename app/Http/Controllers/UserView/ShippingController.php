<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\ShippingState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function checkoutIndex()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShippingDivision::orderBy('name', 'ASC')->get();

                return view('user-view.checkout.view-checkout', compact('carts', 'cartTotal', 'cartQty', 'divisions'));
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

    public function getDistrict($id)
    {
        $shipDistricts = ShippingDistrict::where('division_id', $id)->orderBy('name', 'ASC')->get();
        return json_encode($shipDistricts);
    }

    public function getState($id)
    {
        $shipState = ShippingState::where('district_id', $id)->orderBy('name', 'ASC')->get();
        return json_encode($shipState);
    }

    public function checkoutStore(Request $request)
    {
        $data = [];
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
$cartTotal = Cart::total();
        if ($request->payment_method === 'stripe') {
            return view('user-view.payment.stripe', compact('data','cartTotal'));
        }

        if ($request->payment_method === 'card') {
            return 'card';
        }

        return 'cash';
    }
}
