<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
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
            'cartTotal' => round((int)$cartTotal),
        ]);
    }
}
