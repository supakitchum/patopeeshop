@extends('backend.layouts.main')
@section('title','จัดการสินค้า')
@section('page_name','จัดการ0สินค้า')
@section('sub_page_name','')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">รายการสินค้า</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="product-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>หมวดหมู่</th>
                        <th>เพิ่มเมื่อ</th>
                        <th>แก้ไขล่าสุดเมื่อ</th>
                        <th>การจัดการ</th>
                        </thead>
                        <tbody>
                        @foreach($results as $index=>$result)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->cname }}</td>
                                <td>{{ $result->created_at }}</td>
                                <td>{{ $result->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <a href="" class="btn btn-info btn-rounded w-100"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="" class="btn btn-primary btn-rounded w-100"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="" class="btn btn-danger btn-rounded w-100"><i class="fa fa-trash"></i></a>
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
        $(function () {
            "use strict";

            $('#product-table').DataTable({
                "columnDefs": [
                    { "width": "5%", "targets": 0 },
                    { "width": "20%", "targets": 1 },
                    { "width": "10%", "targets": 2 },
                    { "width": "10%", "targets": 3 },
                    { "width": "10%", "targets": 4 },
                    { "width": "10%", "targets": 5 }
                ]
            });

        }); // End of use strict
    </script>
@stop
