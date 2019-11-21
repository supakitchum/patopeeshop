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
                    <table id="product-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <th>ลำดับ</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th>เพิ่มเมื่อ</th>
                        <th>แก้ไขล่าสุดเมื่อ</th>
                        <th>การจัดการ</th>
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
