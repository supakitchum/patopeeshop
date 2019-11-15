@extends('backend.layouts.main')
@section('title','วิธีการจัดส่ง')
@section('page_name','วิธีการจัดส่ง')
@section('sub_page_name','')
@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">รายการวิธีการจัดส่ง</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <table id="sender-table" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <th>ลำดับ</th>
                        <th>ชื่อบริษัทขนส่ง</th>
                        <th>Link</th>
                        <th>เพิ่มเมื่อ</th>
                        <th>แก้ไขล่าสุดเมื่อ</th>
                        <th>การจัดการ</th>
                    </thead>

                    <tbody>
                        @foreach($results as $index=>$result)
                        <tr>
                            <td>{{ $index + 1 }}</th>
                            <td>{{ $result->name }}</th>
                            <td>{{ $result->link }}</th>
                            <td>{{ $result->created_at }}</th>
                            <td>{{ $result->updated_at }}</th>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <a href="" class="btn btn-primary btn-rounded w-100"><i
                                                class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <a href="" class="btn btn-danger btn-rounded w-100"><i
                                                class="fa fa-trash"></i></a>
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
$(function() {
    "use strict";

    $('#sender-table').DataTable({
        "columnDefs": [{
                "width": "5%",
                "targets": 0
            },
            {
                "width": "15%",
                "targets": 1
            },
            {
                "width": "10%",
                "targets": 2
            },
            {
                "width": "10%",
                "targets": 3
            },
            {
                "width": "10%",
                "targets": 4
            },
            {
                "width": "15%",
                "targets": 5
            }
        ]
    });

}); // End of use strict
</script>
@stop