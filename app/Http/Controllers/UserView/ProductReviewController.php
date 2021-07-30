<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function productReviewStore(Request $request)
    {
        $productId = $request->product_id;
        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);

        ProductReview::insert([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Your Review Submitted. Admin will check it",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


}
