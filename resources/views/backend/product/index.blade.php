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
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายการสินค้า</h3>
                        </div>
                        <div class="col-lg-6 col-sm-12" align="right">
                            <a class="btn btn-rounded text-white" style="background-color: #00be00;" href="{{ route('backend.products.create') }}">
                                <i class="fa fa-plus"></i> เพิ่ม
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="product-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>คงเหลือรวม</th>
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
                                <td>{{ $result->total }}</td>
                                <td>{{ $result->cname }}</td>
                                <td>{{ $result->created_at }}</td>
                                <td>{{ $result->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <a href="" class="btn btn-info btn-rounded w-100"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{ route('backend.products.edit',['id' => $result->id]) }}" class="btn btn-warning btn-rounded w-100"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <form action="{{ route('backend.products.destroy',['id' => $result->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-rounded w-100"><i class="fa fa-trash"></i></button>
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
        $(function () {
            "use strict";

            $('#product-table').DataTable({
                "columns": [
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    { "width": "15%" }
                ]
            });

        }); // End of use strict
    </script>
@stop
