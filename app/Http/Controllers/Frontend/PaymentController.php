<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Order;
use App\Model\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){
        return view('frontend.payment');
    }

    public function store(Request $request){
        $check = Payment::where('order_ref',$request->input('reference'))->count();
        if ($check > 0){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'danger',
                    'messages' => [
                        'title' => 'ไม่สำเร็จ',
                        'body' => 'คำสั่งซื้อ #'.$request->input('reference').' มีการแจ้งชำระเงินแล้ว'
                    ]
                ]
            ]);
        }

        $check = Order::where('reference',$request->input('reference'))->count();
        if ($check == 0){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'danger',
                    'messages' => [
                        'title' => 'ไม่สำเร็จ',
                        'body' => 'ไม่พบคำสั่งซื้อ #'.$request->input('reference')
                    ]
                ]
            ]);
        }
        try {
            $createdAt = Carbon::parse($request->input('transfer_at'))->format('Y-m-d H:i:s');
            $file = $request->file('slip');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = uniqid() . '_' . time() . '.' . $extension;
            if ($file->move('uploads/slips/', $filename)) {
                $create =Payment::create([
                    'amount' => $request->input('amount'),
                    'bank' => 'ธนาคารกสิกรไทย',
                    'order_ref' => $request->input('reference'),
                    'transfer_at' => $createdAt,
                    'slip' => '/uploads/slips/' . $filename,
                ]);
            }
            if ($create) {
                return redirect()->back()->with([
                    'alert' => [
                        'status' => 'success',
                        'messages' => [
                            'title' => 'สำเร็จ',
                            'body' => 'แจ้ง รายการแจ้งชำระ #'.$request->input('reference').' สำเร็จ'
                        ]
                    ]
                ]);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
