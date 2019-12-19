@extends('frontend.layouts.main')
@section('title','รายละเอียดคำสั่งซื้อ #'.$order->reference)
@section('content')
    <div class="main-container shop-with-banner left-slidebar">
        <div class="container">
            <div class="row margin-bottom-60 margin-top-60">
                <div class="col-lg-12 margin-bottom-20">
                    <h3 class="box-title text-left">รายละเอียดคำสั่งซื้อรหัส #{{ $order->reference }}</h3>
                </div>
                <div class="col-sm-12 col-md-8">
                    <table id="product-table" class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th class="d-none d-md-table-cell">รูป</th>
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
                                <td class="d-none d-md-table-cell"><img src="{{ asset($detail->image) }}" width="150px" height="150px"></td>
                                <td>{{ $detail->product_name  }}</td>
                                <td>
                                    <p>สี : {{ $detail->color }}</p>
                                    <p>ขนาด : {{ $detail->size }}</p>
                                </td>
                                <td>{{ number_format( $detail->price,2) }}</td>
                                <td>{{ $detail->amount }}</td>
                                <td>{{ number_format( $detail->price * $detail->amount,2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="d-none d-md-table-cell" colspan="5">ยอดชำระรวม</td>
                            <td class="d-md-none" colspan="4">ยอดชำระรวม</td>
                            <td>{{ number_format($order->total,2) }} บาท</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-border margin-bottom-30">
                                <h3>รายละเอียด</h3>
                                <table class="table table-bordered table-responsive text-left">
                                    <tr>
                                        <td style="width: 150px;">สถานะ :</td>
                                        <td>
                                            @if( $order->status == 1)
                                                รอการชำระเงิน
                                            @elseif($order->status == 2)
                                                รอการชำระเงิน
                                            @elseif($order->status == 3)
                                                ชำระเงินแล้ว
                                            @elseif($order->status == 4)
                                                กำลังจัดส่ง
                                            @elseif($order->status == 5)
                                                จัดส่งเรียบร้อยแล้ว
                                            @elseif($order->status == 6)
                                                ยกเลิกคำสั่งซื้อ
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;">จัดส่งโดย :</td>
                                        <td>
                                            {{ $sender ? $sender->name:'-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;">หมายเลขพัสดุ :</td>
                                        <td>
                                            @isset($sender)
                                                <a class="btn btn-success" href="{{ $sender->link }}">{{ $order->tracking_number ? $order->tracking_number:'-' }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;">ใบเสร็จ :</td>
                                        <td>
                                            @if( $order->status == 1)
                                                <a href="/payment?reference={{ $order->reference }}"
                                                   class="btn btn-primary">แจ้งชำระเงิน</a>
                                            @elseif($order->status == 2)
                                                <a href="/payment?reference={{ $order->reference }}"
                                                   class="btn btn-primary">แจ้งชำระเงิน</a>
                                            @elseif($order->status > 2)
                                                <a class="btn btn-info" href="/receipt/{{ $order->reference }}"><i class="fa fa-file-pdf-o"></i> ใบเสร็จ</a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="text-border">
                                <h3>ข้อมูลที่อยู่จัดส่ง</h3>
                                <table class="table table-bordered table-responsive text-left">
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
                                            ​​{{ $order->address }} ต.{{ $address->district }} อ. {{ $address->amphoe }}
                                            จ.{{ $address->provice }} {{ $order->zip_code }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
