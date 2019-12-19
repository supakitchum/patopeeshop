@extends('backend.layouts.main')
@section('title','หน้าแรก')
@section('page_name','ภาพรวม')
@section('sub_page_name','')
@section('content')
    <!-- Main content -->

    <div class="row">

        <div class="col-12 col-lg-4">
            <div class="box box-body bg-purple">
                <div class="flexbox">
                    <i class="fa fa-user-plus fa-4x"></i>
                    <div class="text-right">
                        <span>สมาชิกใหม่วันนี้</span><br>
                        <span>
                    <span class="font-size-18 ml-1">{{ $stats['user'] }}</span>
                  </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="box box-body bg-green">
                <div class="flexbox">
                    <i class="fa fa-list-alt fa-4x"></i>
                    <div class="text-right">
                        <span>คำสั่งซื้อวันนี้</span><br>
                        <span>
                    <span class="font-size-18 ml-1">{{ $stats['order'] }}</span>
                  </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="box box-body bg-red">
                <div class="flexbox">
                    <i class="fa fa-money fa-4x"></i>
                    <div class="text-right">
                        <span>รายการแจ้งชำระวันนี้</span><br>
                        <span>
                    <span class="font-size-18 ml-1">{{ $stats['payment'] }}</span>
                  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-xl-12">
            <!-- solid sales graph -->
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-th"></i>

                    <h3 class="box-title">กราฟการขาย</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-white btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-white btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 237px;"></div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col text-center" style="border-right: 1px solid #f4f4f4">
                            <input type="text" class="knob" data-readonly="true" value="{{ $stats['order_from_facebook'] }}" data-width="60" data-height="60"
                                   data-fgColor="#7460ee">

                            <div class="knob-label">Facebook</div>
                        </div>
                        <!-- ./col -->
                        <div class="col text-center" style="border-right: 1px solid #f4f4f4">
                            <input type="text" class="knob" data-readonly="true" value="{{ $stats['order_from_line'] }}" data-width="60" data-height="60"
                                   data-fgColor="#7460ee">

                            <div class="knob-label">Line</div>
                        </div>
                        <!-- ./col -->
                        <div class="col text-center">
                            <input type="text" class="knob" data-readonly="true" value="{{ $stats['order_from_website'] }}" data-width="60" data-height="60"
                                   data-fgColor="#7460ee">

                            <div class="knob-label">Web Store</div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-xl-6">

            <!-- TO DO List -->
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-file"></i>

                    <h3 class="box-title">รายการแจ้งชำระ</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="payment-table" class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>รหัสอ้างอิง</th>
                            <th>จำนวน</th>
                            <th>แจ้งเมื่อ</th>
                            ​<th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->order_ref }}</td>
                                <td>{{ number_format($payment->amount,2) }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>
                                    <a href="{{ route('backend.payments.edit',['id' => $payment->id]) }}" class="btn btn-success btn-rounded text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-xl-6">

            <!-- TO DO List -->
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-file"></i>

                    <h3 class="box-title">รายการคำสั่งซื้อ</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="order-table" class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>รหัสอ้างอิง</th>
                            <th>ชื่อลูกค้า</th>
                            <th>สถานะ</th>
                            <th>ราคา</th>
                            ​<th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->reference }}</td>
                                <td>{{ $order->fname .' '.$order->lname }}</td>
                                <td>
                                    @if( $order->status == 1)
                                        ใหม่
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
                                ​<td>{{ number_format($order->total,2) }}</td>
                                <td>
                                    <a href="{{ route('backend.orders.show',['id' => $order->id]) }}" class="btn btn-success btn-rounded text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('#payment-table,#order-table').dataTable()
        })
    </script>
@endsection
