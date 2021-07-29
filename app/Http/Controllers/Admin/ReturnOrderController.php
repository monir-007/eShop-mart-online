<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    public function returnOrderRequest()
    {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('admin.return-orders.return-request', compact('orders'));
    }

    public function returnOrderApprove($orderId)
    {
        Order::where('id', $orderId)->update([
            'return_order' => 2
        ]);

        $notification = [
            'message' => 'Return Order Approved Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function returnOrderAllRequest()
    {
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('admin.return-orders.return-request-all', compact('orders'));

    }
}
