@extends('frontend.layouts.main')
@section('title','รายละเอียดคำสั่งซื้อ #'.$order->reference)
@section('content')
    <div class="col-full mt-5">
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="text-border">
                            <h3>รายละเอียด</h3>
                            <table class="table table-bordered text-left">
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
                                            <a class="btn btn-success w-100" href="{{ $sender->link }}">{{ $order->tracking_number ? $order->tracking_number:'-' }}</a>
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
                                            <a class="btn btn-info w-100" href="/receipt/{{ $order->reference }}"><i class="fa fa-file-pdf-o"></i> ใบเสร็จ</a>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
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
                                    <td style="width: 200px;">เบอร์โทร.</td>
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
                    <div class="col-sm-12 mt-2">
                        <h3 class="box-title text-left">รายละเอียดคำสั่งซื้อรหัส #{{ $order->reference }}</h3>
                        <table id="product-table" class="table table-bordered table-responsive-sm">
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
                                        <p>กำลังไฟ : {{ $detail->color }}</p>
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
                </div>
            </div>
        </div>
    </div>
@endsection
