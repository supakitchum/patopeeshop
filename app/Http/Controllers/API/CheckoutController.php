<?php

namespace App\Http\Controllers\API;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        foreach ($request->data as $order){
            Order::create([
                'mid',
                'status',
                'tracking_number',
                'reference',
                'admin_id',
                'total',
                'sender_id',
                'platform'
            ]);
        }
    }
}
