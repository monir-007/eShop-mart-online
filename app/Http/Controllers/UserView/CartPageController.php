<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
            'carts'=>$carts,
            'cartQty'=>$cartQty,
            'cartTotal'=>round((int)$cartTotal),
        ]);
    }
}
