@extends('backend.layouts.main')
@section('title','คำสั่งซื้อ #'.$order->reference)
@section('page_name','คำสั่งซื้อ')
@section('sub_page_name','(รายละเอียดคำสั่งซื้อ)')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายละเอียดคำสั่งซื้อรหัส #{{ $order->reference }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="box-title">รายการสินค้า</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('backend.receipts.show',['id' => $order->id]) }}" class="btn btn-info btn-rounded"><i class="fa fa-file-text-o"></i> ใบเสร็จ/ใบจัดส่ง</a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <table id="product-table" class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>รูป</th>
                                <th>ชื่อสินค้า</th>
                                <th>คุณลักษณะ</th>
                                <th>ราคาต่อชิ้น</th>
                                <th>จำนวน</th>
                                <th>ราคารวม</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td><img src="{{ asset($detail->image) }}" width="150px" height="150px"> </td>
                                        <td>{{ $detail->product_name  }}</td>
                                        <td>
                                            <p>กำลังไฟ : {{ $detail->color }}</p>
                                            <p>ขนาด : {{ $detail->size }}</p>
                                        </td>
                                        <td>{{ number_format( $detail->price,2) }}</td>
                                        <td>{{ $detail->amount }}</td>
                                        <td>{{ number_format( $detail->price * $detail->amount,2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">ยอดชำระรวม</td>
                                    <td>{{ number_format($order->total,2) }} บาท</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">ข้อมูลลูกค้า</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <td>ชื่อ</td>
                                        <td>{{ $order->fname.' '.$order->lname }}</td>
                                    </tr>
                                    <tr>
                                        <td>อีเมล</td>
                                        <td>{{ $order->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>เบอร์โทร.</td>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>ที่อยู่</td>
                                        <td>
                                            ​​{{ $order->address }} ต.{{ $address->district }} อ. {{ $address->amphoe }} จ.{{ $address->provice }} {{ $order->zip_code }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
{{--                        <div class="box-header">--}}
{{--                            <h3 class="box-title">สถานะคำสั่งซื้อ<span class="ml-5 pull-right badge bg-blue">{{ $order->status }}</span></h3>--}}
{{--                        </div>--}}
                        <div class="box-body">
                            <form action="{{ route('backend.orders.update',['id' => $order->id]) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>คำสั่งซื้อจาก</label>
                                            <select name="platform" class="form-control">
                                                <option {{ $order->platform == 1 ? 'selected':'' }} value="1">Facebook</option>
                                                <option {{ $order->platform == 2 ? 'selected':'' }} value="2">Line</option>
                                                <option {{ $order->platform == 3 ? 'selected':'' }} value="3">WebSite</option>
                                                <option {{ $order->platform == 4 ? 'selected':'' }} value="4">Store</option>
                                                <option {{ $order->platform == 5 ? 'selected':'' }} value="5">อื่นๆ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>สถานะคำสั่งซื้อ</label>
                                            <select name="status" class="form-control">
                                                <option {{ $order->status == 1 ? 'selected':'' }} value="1">ใหม่</option>
                                                <option {{ $order->status == 2 ? 'selected':'' }} value="2">รอการชำระเงิน</option>
                                                <option {{ $order->status == 3 ? 'selected':'' }} value="3">ชำระเงินแล้ว</option>
                                                <option {{ $order->status == 4 ? 'selected':'' }} value="4">กำลังจัดส่ง</option>
                                                <option {{ $order->status == 5 ? 'selected':'' }} value="5">จัดส่งเรียบร้อยแล้ว</option>
                                                <option {{ $order->status == 6 ? 'selected':'' }} value="6">ยกเลิกคำสั่งซื้อ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>จัดส่งโดย</label>
                                            <select name="sender_id" class="form-control">
                                                <option disabled selected>กรุณาเลือกผู้จัดส่ง</option>
                                                @foreach($senders as $sender)
                                                    <option {{ $sender->id == $order->sender_id ? 'selected':'' }} value="{{ $sender->id }}">{{ $sender->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>หมายเลขพัสดุ</label>
                                            <input type="text" class="form-control" name="tracking_number" value="{{ isset($order->tracking_number) ? $order->tracking_number:'' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-success btn-rounded w-100">
                                            บันทึก
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
