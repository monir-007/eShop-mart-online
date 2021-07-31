<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingOrders()
    {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
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
        $orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
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

    public function pendingOrdersConfirm($orderId): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'status' => 'confirm'
        ]);
        $notification = [
            'message' => 'Order confirm successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('pending.orders')->with($notification);
    }

    public function pendingOrdersConfirmIndex($orderId): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'status' => 'confirm'
        ]);
        $notification = [
            'message' => 'Order confirm successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function confirmOrdersProcessing($orderId): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'status' => 'processing'
        ]);
        $notification = [
            'message' => 'Order confirm successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('confirmed.orders')->with($notification);
    }

    public function processingOrdersPicked($orderId): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'status' => 'picked'
        ]);
        $notification = [
            'message' => 'Order picked successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('processing.orders')->with($notification);
    }

    public function pickedOrdersShipped($orderId): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'status' => 'shipped'
        ]);
        $notification = [
            'message' => 'Order shipped successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('picked.orders')->with($notification);
    }

    public function shippedOrdersDelivered($orderId): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'status' => 'delivered'
        ]);
        $notification = [
            'message' => 'Order delivered successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('shipped.orders')->with($notification);
    }

    public function deliveredOrdersCancel($orderId): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'status' => 'canceled'
        ]);
        $notification = [
            'message' => 'Order cancel successfully.',
            'alert-type' => 'warning'
        ];
        return redirect()->route('delivered.orders')->with($notification);
    }

    public function orderInvoiceDownload($orderId)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $orderId)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $orderId)->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('admin.orders.invoice-order', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
