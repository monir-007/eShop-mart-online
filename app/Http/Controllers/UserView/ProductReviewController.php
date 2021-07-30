<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Review;

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

    public function productReviewPending()
    {
        $review = ProductReview::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('admin.product-review.pending-review', compact('review'));
    }

    public function productReviewApprove($id)
    {
        ProductReview::where('id', $id)->update([
            'status' => 1
        ]);

        $notification = [
            'message' => "Review Approved Successfully",
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function productReviewPublish()
    {
        $review = ProductReview::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.product-review.published-review', compact('review'));
    }

    public function productReviewDelete($id)
    {
        ProductReview::findOrFail($id)->delete();

        $notification = [
            'message' => "Review Delete Successfully",
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

}
