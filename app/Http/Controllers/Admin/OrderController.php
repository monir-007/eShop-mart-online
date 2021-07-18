<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pendingOrders()
    {
$orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
return view('admin.orders.pending-orders', compact('orders'));
    }

    public function pendingOrdersDetail($orderId)
    {
        $order = Order::with('division','district','state','user')->where('id',$orderId)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $orderId)->orderBy('id','DESC')->get();
        return view('admin.orders.pending-orders-detail', compact('order','orderItem'));

    }
}
