<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function myOrders()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('user-view.order.view-orders', compact('orders'));
    }

    public function orderDetails($orderId)
    {
        $order = Order::with('division','district','state','user')->where('id',$orderId)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $orderId)->orderBy('id','DESC')->get();
        return view('user-view.order.details-order', compact('order','orderItem'));

    }
}
