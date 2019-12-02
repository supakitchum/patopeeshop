<?php

namespace App\Http\Controllers\Backend;

use App\Model\Order;
use App\Model\Payment;
use App\Model\ProductDetail;
use App\Model\Report;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::join('users', 'orders.mid', '=', 'users.id')
            ->where('admin_id', 0)
            ->select('orders.*', 'users.fname', 'users.lname')
            ->orderBy('orders.created_at', 'desc')
            ->get();
        $stats = [
            'order' => Order::whereDate('created_at',Carbon::today())->count(),
            'payment' => Payment::whereDate('created_at',Carbon::today())->count(),
            'user' => User::whereDate('created_at',Carbon::today())->count(),
            'report' => Report::whereDate('created_at',Carbon::today())->count(),
            'order_from_facebook' => Order::whereMonth('created_at',Carbon::today())->where('platform',1)->count(),
            'order_from_line' => Order::whereMonth('created_at',Carbon::today())->where('platform',2)->count(),
            'order_from_website' =>  Order::whereMonth('created_at',Carbon::today())->where('platform',3)->count(),
        ];
        $payments = Payment::where("confirm", 0)->get();
        return view('backend.dashboard')->with(
            [
                'orders' => $orders,
                'payments' => $payments,
                'stats' => $stats
            ]
        );
    }
}
