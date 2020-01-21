<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Model\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductDetail;
use App\Model\Sender;
use App\User;
use PDF;

class ReceiptController extends Controller
{
    private $product, $order, $orderDetail, $productDetail;
    public function __construct(
        Product $product,
        Order $order,
        OrderDetail $orderDetail,
        ProductDetail $productDetail
    ) {
        $this->product = $product;
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->productDetail = $productDetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->find($id);
        $details = $this->orderDetail->where('order_id', $id)->get();
        $senders = Sender::all();
        $address = District::where(
            [
                'district_code' => $order->district,
                'amphoe_code' => $order->amphoe,
                'province_code' => $order->province
            ])->first();

        $pdf = PDF::loadView('frontend.pdf', [
            'details' => $details,
            'order' => $order,
            'senders' => $senders,
            'address' => $address
        ]);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
