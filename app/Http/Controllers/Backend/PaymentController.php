<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    private $payment;
    public function __construct(
        Payment $payment
    ) {
        $this->middleware('auth:admin');
        $this->payment = $payment;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->payment->where("confirm", 0)->get();
        // return $results;
        return view('backend.payment.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.payment.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $file = $request->file('slip');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = uniqid() . '_' . time() . '.' . $extension;
            if ($file->move('uploads/slips/', $filename)) {
                $create = $this->payment->create([
                    'amount' => $request->input('amount'),
                    'bank' => $request->input('bank'),
                    'order_id' => $request->input('order_id'),
                    'transfer_at' => $request->input('transfer_at'),
                    'slip' => '/uploads/slips/' . $filename,
                ]);
            }
            if ($create) {
                return redirect()->route('backend.payments.index')->with([
                    'status' => [
                        'class' => 'success',
                        'message' => 'เพิ่ม รายการแจ้งชำระ สำเร็จ'
                    ]
                ]);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = $this->payment->find($id);
        // return $payment;
        $payment->confirm = 1;
        $payment->save();
        return redirect()->route('backend.payments.index')->with([
            'status' => [
                'class' => 'success',
                'message' => 'ยืนยันรายการแจ้งชำระสำเร็จ'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = $this->payment->find($id);
        return view('backend.payment.form', ['results' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $createdAt = Carbon::parse($request->input('transfer_at'))->format('Y-m-d H:i:s');
        // return $request->file('slip');

        if ($request->file('slip')) {
            $file = $request->file('slip');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = uniqid() . '_' . time() . '.' . $extension;
            if ($file->move('uploads/slips/', $filename)) {
                $payment = $this->payment->find($id);
                $payment->amount = $request->input('amount');
                $payment->bank = $request->input('bank');
                $payment->order_id = $request->input('order_id');
                $payment->transfer_at = $createdAt;
                if ($request->file('slip')) {
                    $payment->slip = '/uploads/slips/' . $filename;
                }
                $payment->save();
            }
        } else {
            $payment = $this->payment->find($id);
            $payment->amount = $request->input('amount');
            $payment->bank = $request->input('bank');
            $payment->order_id = $request->input('order_id');
            $payment->transfer_at = $createdAt;
            $payment->save();
        }
        return redirect()->route('backend.payments.index')->with([
            'status' => [
                'class' => 'success',
                'message' => 'แก้ไข รายการแจ้งชำระ สำเร็จ'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $payment = $this->payment->find($id);
        $payment->delete();

        return redirect()->back()->with([
            'status' => [
                'class' => 'success',
                'message' => 'ลบ รายการแจ้งชำระ สำเร็จ'
            ]
        ]);
    }
}