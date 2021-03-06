<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WishlistController extends Controller
{
    public function viewWishlist()
    {
        return view('user-view.wishlist.view-wishlist');
    }

    public function addToWishlist($product_id, Request $request)
    {
        if (Auth::check()) {
            $productExists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if (!$productExists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => "Product added to your Wishlist."]);
            }
            return response()->json(['error' => "Product has already exists in your Wishlist."]);
        }
        return response()->json(['error' => "You haven't login yet. please Login First"]);
    }


    public function getWishlistProduct()
    {
        $wishlistProduct = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlistProduct);
    }

    public function removeWishlistProduct($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success'=>'Product remove from wishlist.']);
    }
}
