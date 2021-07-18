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
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending-orders', compact('orders'));
    }

    public function pendingOrdersDetail($orderId)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $orderId)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $orderId)->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending-orders-detail', compact('order', 'orderItem'));

    }

    public function confirmedOrders()
    {
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('admin.orders.confirmed-orders', compact('orders'));

    }

    public function processingOrders()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('admin.orders.processing-orders', compact('orders'));

    }

    public function pickedOrders()
    {
        $orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('admin.orders.picked-orders', compact('orders'));

    }
    public function shippedOrders()
    {
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('admin.orders.shipped-orders', compact('orders'));
    }

    public function deliveredOrders()
    {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('admin.orders.delivered-orders', compact('orders'));
    }
    public function cancelOrders()
    {
        $orders = Order::where('status', 'canceled')->orderBy('id', 'DESC')->get();
        return view('admin.orders.canceled-orders', compact('orders'));
    }
}
