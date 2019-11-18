@extends('backend.layouts.main')
@section('title','สินค้า')
@section('page_name','สินค้า')
@section('sub_page_name','')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายละเอียดสินค้า</h3>
                        </div>
                        <div class="col-lg-6 col-sm-12" align="right">
                            <a class="btn btn-rounded text-white btn-primary" href="{{ route('backend.products.index') }}">
                                <i class="fa fa-list"></i> รายการ
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อสินค้า</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>ราคา</label>
                                        <div class="input-group">
                                            <input type="text" name="amount" class="form-control" required placeholder="0">
                                            <span class="input-group-addon">บาท</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-group">
                                            <label>หมวดหมู่</label>
                                            <select multiple class="form-control selectpicker">
                                                <option>เสื้อโปโล</option>
                                                <option>เสื้อยืด</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $('select').selectpicker();
        })
    </script>
@stop
