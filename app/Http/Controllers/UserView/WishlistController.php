<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WishlistController extends Controller
{
    public function addToWishlist($product_id, Request $request)
    {
        if (Auth::check()) {
            $userExists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now()

            ]);
            return response()->json(['success' => "Product added to your Wishlist."]);

        } else {
            return response()->json(['error' => "You haven't login yet. please Login First"]);
        }
    }
}
