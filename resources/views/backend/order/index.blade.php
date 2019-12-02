@extends('backend.layouts.main')
@section('title','คำสั่งซื้อ')
@section('page_name','คำสั่งซื้อ')
@section('sub_page_name','(รายการคำสั่งซื้อ)')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายการคำสั่งซื้อ</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="order-table" class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>เลขอ้างอิงคำสั่งซื้อ</th>
                            <th>ผู้สั่งซื้อ</th>
                            <th>ราคา</th>
                            <th>สถานะ</th>
                            <th>ทำรายการเมื่อ</th>
                            <th>การจัดการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $index=>$result)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $result['reference'] }}</td>
                                <td>{{ $result['fname'].' '.$result['lname'] }}</td>
                                <td>{{ number_format($result['total'],2) }}</td>
                                <td>
                                    @if( $result['status'] == 1)
                                        ใหม่
                                    @elseif($result['status'] == 2)
                                        รอการชำระเงิน
                                    @elseif($result['status'] == 3)
                                        ชำระเงินแล้ว
                                    @elseif($result['status'] == 4)
                                        กำลังจัดส่ง
                                    @elseif($result['status'] == 5)
                                        จัดส่งเรียบร้อยแล้ว
                                    @elseif($result['status'] == 6)
                                        ยกเลิกคำสั่งซื้อ
                                    @endif
                                </td>
                                <td>{{ $result['created_at'] }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <a href="{{ route('backend.orders.show',['id' => $result['id']]) }}"
                                               class="btn btn-info btn-rounded w-100"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <form action="{{ route('backend.orders.destroy',['id' => $result['id']]) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-rounded w-100"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('#order-table').dataTable({});
        })
    </script>
@endsection
