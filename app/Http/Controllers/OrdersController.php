<?php

namespace App\Http\Controllers;
use App\http\Models\Order;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show($order_id) {
        $order = Order::find($order_id);

        // check if order belongs to logged in user
        if(\Auth::user()->id != $order->user_id) {
            abort('403', 'Not authorized...');
        }

        return view('orders.confirmOrder', [
            'order' => $order
        ]);
    }
}
