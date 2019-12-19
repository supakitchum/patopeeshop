@extends('frontend.layouts.main')
@section('title','ประวัติคำสั่งซื้อ')
@section('content')
    <div class="main-container shop-with-banner left-slidebar">
        <div class="container">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="box-title"><i class="fa fa-list"></i> ประวัติคำสั่งซื้อ</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="overflow-x: scroll;">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>เลขที่คำสั่งซื้อ</th>
                        <th>ยอดชำระ</th>
                        <th>วิธีชำระเงิน</th>
                        <th>สถานะ</th>
                        <th>การจัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $index=>$result)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $result->reference }}</td>
                            <td class="text-right">{{ number_format($result->total) }} บาท</td>
                            <td>โอนผ่านธนาคาร</td>
                            <td>
                                @if( $result->status == 1)
                                    รอการชำระเงิน
                                @elseif($result->status == 2)
                                    รอการชำระเงิน
                                @elseif($result->status == 3)
                                    ชำระเงินแล้ว
                                @elseif($result->status == 4)
                                    กำลังจัดส่ง
                                @elseif($result->status == 5)
                                    จัดส่งเรียบร้อยแล้ว
                                @elseif($result->status == 6)
                                    ยกเลิกคำสั่งซื้อ
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6" style="margin-bottom: 2px;">
                                        <a href="/history/{{ $result->id }}" class="btn btn-info w-100">ข้อมูลเพิ่มเติม</a>
                                    </div>
                                    @if($result->status == 1 || $result->status == 2)
                                        <div class="col-sm-12 col-md-6">
                                            <a href="/payment?reference={{ $result->reference }}" class="btn btn-primary w-100">แจ้งชำระเงิน</a>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 text-center">
                {{ $results->links() }}
            </div>
        </div>
    </div>
@endsection
