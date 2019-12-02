<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductDetail;
use App\Model\ProductImage;
use App\Model\Sender;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $product,$order,$orderDetail,$productDetail,$productImage;
    public function __construct(
        Product $product,
        Order $order,
        OrderDetail $orderDetail,
        ProductDetail $productDetail,
        ProductImage $productImage
    ){
        $this->product = $product;
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->productDetail = $productDetail;
        $this->productImage = $productImage;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_orders = $this->order
            ->join('admins','orders.admin_id','=','admins.id')
            ->where('mid',0)
            ->select('orders.*','admins.fname','admins.lname')
            ->orderBy('orders.created_at','desc')
            ->get()
            ->toArray();
        $user_orders = $this->order
            ->join('users','orders.mid','=','users.id')
            ->where('admin_id',0)
            ->select('orders.*','users.fname','users.lname')
            ->orderBy('orders.created_at','desc')
            ->get()
            ->toArray();
//        $results = $admin_orders + $user_orders;
        if (sizeof($admin_orders) > 0 && sizeof($user_orders) > 0){
            $merged = array_merge_recursive($admin_orders, $user_orders);
            uasort($merged, function($a, $b){
                return strtotime($a['created_at']) - strtotime($b['created_at']);
            });
            $results = $merged;
        }
        else if (sizeof($admin_orders) > 0){
            $results = $admin_orders;
        }
        else if (sizeof($user_orders) > 0){
            $results = $user_orders;
        }
        else{
            $results = [];
        }
        return view('backend.order.index')->with(['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->product->all();
        return view('backend.order.form-create')->with(['products'=>$products,'images' => $this->product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->input('aid')){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'error',
                    'messages' => [
                        'title' => 'สร้างคำสั่งซื้อไม่สำเร็จ',
                        'body' => 'รายละเอียดปัญหา : ไม่พบสินค้าในรถเข็นของท่าน'
                    ]
                ]
            ]);
        }
        try{
            while (true){
                $ref = str_random(15);
                $order_ref = $this->order->where('reference',$ref)->count();
                if ($order_ref == 0)
                    break;
            }
            $new_order = $this->order->create([
                'mid' => 0,
                'admin_id' => auth()->user()->id,
                'status' => 1,
                'reference' => $ref,
                'total' => 0
            ]);
            $total = 0;
            foreach ($request->input('aid') as $index=>$aid){
                $product = $this->productDetail
                    ->join('products','product_details.pid','=','products.id')
                    ->join('colors','product_details.color','=','colors.id')
                    ->join('sizes','product_details.size','=','sizes.id')
                    ->where('product_details.id',$aid)
                    ->select('colors.name as color','sizes.name as size','product_details.price','products.name','products.id')
                    ->get();
                $product = $product[0];
                $image = $this->productImage->where('pid',$product->id)->latest('created_at')->first();
                $order = $this->orderDetail->create([
                    'order_id' => $new_order->id,
                    'color' => $product->color,
                    'size' => $product->size,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'amount' => $request->input('amount')[$index],
                    'image' => $image->path
                ]);
                $total += $product->price * $request->input('amount')[$index];
            }
            $order = $this->order->find($new_order->id);
            $order->total = $total;
            $order->save();
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'success',
                    'messages' => [
                        'title' => 'สร้างคำสั่งซื้อสำเร็จ',
                        'body' => 'สร้างคำสั่งซื้อสินค้าสำเร็จแล้ว ตรวจสอบได้ที่ รายการคำสั่งซื้อ'
                    ]
                ]
            ]);
        } catch (\Exception $e){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'error',
                    'messages' => [
                        'title' => 'สร้างคำสั่งซื้อไม่สำเร็จ',
                        'body' => 'รายละเอียดปัญหา : '.$e
                    ]
                ]
            ]);
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
        $order = $this->order->find($id);
        if ($order->mid == 0)
            $user = Admin::find($order->admin_id);
        else
            $user = User::withTrashed()->find($order->mid);
        $details = $this->orderDetail->where('order_id',$id)->get();
        $senders = Sender::all();
        return view('backend.order.detail')->with(
            [
                'details' => $details,
                'order' => $order,
                'user' => $user,
                'senders' => $senders
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
        $data = $request->validate([
            'sender_id' => 'integer',
            'status' => 'required|integer',
            'tracking_number',
            'platform' => 'required'
        ]);
        $order = $this->order->find($id);
        try{
            $order->update($data);
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'success',
                    'messages' => [
                        'title' => 'แก้ไขสถานะแล้ว',
                        'body' => 'แก้ไขสถานะคำสั่งซื้อหมายเลข #'.$order->reference.' เรียบร้อย'
                    ]
                ]
            ]);
        }catch (\Exception $e){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'error',
                    'messages' => [
                        'title' => 'แก้ไขสถานะไม่สำเร็จ',
                        'body' => 'รายละเอียดปัญหา : '.$e
                    ]
                ]
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this->order->find($id);
        $ref = $order->reference;
        try{
            $order->delete();
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'success',
                    'messages' => [
                        'title' => 'ลบคำสั่งซื้อสำเร็จ',
                        'body' => 'ลบคำสั่งซื้อเลขที่อ้างอิง #'.$ref.' สำเร็จ'
                    ]
                ]
            ]);
        }catch (\Exception $e){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'error',
                    'messages' => [
                        'title' => 'ลบคำสั่งซื้อ #'.$ref.' ไม่สำเร็จ',
                        'body' => 'รายละเอียดปัญหา : '.$e
                    ]
                ]
            ]);
        }
    }
}
