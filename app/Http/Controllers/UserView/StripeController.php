<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function stripePayment(Request $request)
    {
        if (Session::has('coupon')) {
            $totalAmount = Session::get('coupon')['totalAmount'];
        } else {
            $totalAmount = round((float)Cart::total());
        }

        Stripe::setApiKey('sk_test_51J7RZqAp8qOK88MHw79odyARGG81qwrupkjHLmoitK4ZmjIHG2Sw7w8aAIIVd7N9hausA5OWQprakVq5a5IfVME300uG48h1J1');

        $token = $_POST['stripeToken'];

        $charge = Charge::create([
            'amount' => $totalAmount * 100,
            'currency' => 'usd',
            'description' => 'shopMart e-shop',
            'source' => $token,
            'metadata' => ['order_id' => uniqid('', true)],
        ]);
//        dd($charge);
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

            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $totalAmount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'SMT' . random_int(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);
//        dd($orderID);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $orderID,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now()
            ]);
        }
        if (Session::has('coupon')){
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
