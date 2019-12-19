<?php

namespace App\Http\Controllers\Frontend;

use App\Model\District;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Sender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Order::where('mid', auth()->user()->id)->paginate(10);
        return view('frontend.history.index')->with(['results' => $results]);
    }

    public function detail($id)
    {
        $order = Order::where(['mid' => auth()->user()->id, 'id' => $id])->first();
        if (!isset($order) || sizeof($order->toArray()) == 0)
            return abort(404);
        $details = OrderDetail::where('order_id', $id)->get();
        if (isset($order->sender_id))
            $sender = Sender::find($order->sender_id);
        $address = District::where(
            [
                'district_code' => $order->district,
                'amphoe_code' => $order->amphoe,
                'province_code' => $order->province
            ])->first();
        return view('frontend.history.detail')->with([
            'order' => $order,
            'details' => $details,
            'address' => $address,
            'sender' => isset($sender) ? $sender : null
        ]);
    }

    public function receipt($id)
    {
        $order = Order::where('reference',$id)->first();
        if (!isset($order) || !$order->mid == auth()->user()->id)
            return abort(404);
        $details = OrderDetail::where('order_id', $order->id)->get();
        $senders = Sender::all();

        $pdf = PDF::loadView('frontend.pdf', [
            'details' => $details,
            'order' => $order,
            'senders' => $senders
        ]);
        return $pdf->stream();
    }
}
