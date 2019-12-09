@extends('frontend.layouts.main')
@section('title','ประวัติคำสั่งซื้อ')
@section('content')
    <div class="main-container no-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row text-border margin-bottom-60">
                        <p><h1 class="text-success"><i class="fa fa-check-circle"></i> ยืนยันคำสั่งซื้อ #{{ $order->reference }} สำเร็จ</h1></p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h3>ข้อมูลสินค้า</h3>
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูป</th>
                            <th>ชื่อสินค้า</th>
                            <th>คุณลักษณะ</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $index=>$detail)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td><img src="{{ asset($detail->image) }}" width="150px" height="150px"> </td>
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
                            <td colspan="6">ยอดชำระรวม</td>
                            <td>{{ number_format($order->total,2) }} บาท</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <h3>ข้อมูลที่อยู่จัดส่ง</h3>
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
@endsection
@section('script')
    <script>
        sessionStorage.clear();
        $('.show-cart').html('');
        $('.total-cart').html(0);
        $('.total-count').html(0);
    </script>
@endsection
