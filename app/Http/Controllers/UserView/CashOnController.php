<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashOnController extends Controller
{

    public function cashOnPayment(Request $request)
    {
        if (Session::has('coupon')) {
            $totalAmount = Session::get('coupon')['totalAmount'];
        } else {
            $totalAmount = round((float)Cart::total());
        }

        $orderID = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->division_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_method' => 'Cash On Delivery',
            'payment_type' =>'Cash On Delivery',
            'currency'=>'USD',
            'amount' => $totalAmount,

            'invoice_no' => 'SMT' . random_int(10000000, 99999999),
            'order_number' => 'CSH' . random_int(100000000000, 999999999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),

        ]);
//        dd($orderID);
//Send Email
        $invoice = Order::findOrFail($orderID);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $totalAmount,
            'name' => $invoice->name,
            'email' => $invoice->email,
            'payment_type' =>'Cash On Delivery',
        ];
        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $orderID,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now()
            ]);
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = [
            'message' => 'Your Order placed Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('dashboard')->with($notification);

    }
}
