<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function stripePayment(Request $request)
    {

        Stripe::setApiKey('sk_test_51J7RZqAp8qOK88MHw79odyARGG81qwrupkjHLmoitK4ZmjIHG2Sw7w8aAIIVd7N9hausA5OWQprakVq5a5IfVME300uG48h1J1');

        $token = $_POST['stripeToken'];

        $charge = Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'shopMart e-shop',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);
        dd($charge);
    }
}
