<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function invoiceDownload($orderId)
    {
        $order = Order::with('division','district','state','user')->where('id',$orderId)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $orderId)->orderBy('id','DESC')->get();
        $pdf = PDF::loadView('user-view.order.invoice-order', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir'=>public_path(),
            'chroot'=>public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }

    public function returnOrder($orderId, Request $request ): RedirectResponse
    {
        Order::findOrFail($orderId)->update([
            'return_date'=>Carbon::now()->format('d F Y'),
            'return_reason'=>$request->return_reason,
            'return_order'=>1,
        ]);

        $notification = [
            'message' => 'Your return request send successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('my.orders')->with($notification);

    }

    public function returnOrderList()
    {
        $orders = Order::where('user_id',Auth::id())->where('return_reason', '!=', null)->orderBy('id','DESC')->get();
        return view('user-view.order.return-orders-view', compact('orders'));

    }

    public function cancelOrder()
    {
        $orders = Order::where('user_id',Auth::id())->where('status', 'canceled')->orderBy('id','DESC')->get();
        return view('user-view.order.cancel-orders-view', compact('orders'));

    }
}
