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
                        </thead>
                        <tbody>

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

            $('#product-table').DataTable();

        }); // End of use strict
    </script>
@stop
