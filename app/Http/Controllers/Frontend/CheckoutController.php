<?php

namespace App\Http\Controllers\Frontend;

use App\Model\District;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\ProductDetail;
use App\Model\ProductImage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(auth()->user()->id)) {
            $address = District::where(
                [
                    'district_code' => auth()->user()->district,
                    'amphoe_code' => auth()->user()->amphoe,
                    'province_code' => auth()->user()->province
                ])->first();
            return view('frontend.checkout')->with(['address' => $address]);
        }
        return view('frontend.checkout');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => "required",
            'lname' => "required",
            'email' => "required",
            'province' => "required",
            'district' => "required",
            'amphoe' => "required",
            'zip_code' => "required",
            'address' => "required",
            'phone' => "required"
        ]);
        while (true) {
            $ref = str_random(15);
            $order_ref = Order::where('reference', $ref)->count();
            if ($order_ref == 0)
                break;
        }
        $new_order = Order::create([
            'mid' => isset(auth()->user()->id) ? auth()->user()->id : 0,
            'status' => 1,
            'tracking_number' => null,
            'reference' => $ref,
            'admin_id' => 0,
            'total' => 0,
            'sender_id' => null,
            'platform' => 3,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'province' => $request->province,
            'district' => $request->district,
            'amphoe' => $request->amphoe,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        $total = 0;
        foreach ($request->input('aid') as $index => $aid) {
            $product = ProductDetail::join('products', 'product_details.pid', '=', 'products.id')
                ->join('colors', 'product_details.color', '=', 'colors.id')
                ->join('sizes', 'product_details.size', '=', 'sizes.id')
                ->where('product_details.id', $aid)
                ->select('colors.name as color', 'sizes.name as size', 'product_details.price', 'products.name', 'products.id')
                ->get();
            $product = $product[0];
            $image = ProductImage::where('pid', $product->id)->latest('created_at')->first();
            $order = OrderDetail::create([
                'order_id' => $new_order->id,
                'color' => $product->color,
                'size' => $product->size,
                'product_name' => $product->name,
                'aid' => $aid,
                'price' => $product->price,
                'amount' => $request->input('amount')[$index],
                'image' => $image->path
            ]);
            $total += $product->price * $request->amount[$index];
        }
        $order = Order::find($new_order->id);
        $order->total = $total;
        $order->save();
        return redirect(route('checkout.show',['id' => $new_order->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if ($order === null){
            return redirect('/');
        }
        $address = District::where(
            [
                'district_code' => $order->district,
                'amphoe_code' => $order->amphoe,
                'province_code' => $order->province
            ])->first();
        return view('frontend.checkout-success')->with([
            'order' => $order,
            'details' => OrderDetail::where('order_id',$id)->get(),
            'address' => $address
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
