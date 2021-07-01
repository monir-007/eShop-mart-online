<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function myOrders()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('user-view.order.view-orders', compact('orders'));
    }
}
