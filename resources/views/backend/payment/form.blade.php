@extends('backend.layouts.main')
@section('title','รายการแจ้งชำระ')
@section('page_name','รายการแจ้งชำระ')
@section('sub_page_name','')
@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        @if(Request::is('*edit'))
                        <h3 class="box-title">แก้ไขรายการแจ้งชำระ</h3>
                        @else
                        <h3 class="box-title">เพิ่มรายการแจ้งชำระ</h3>
                        @endif

                    </div>
                    <div class="col-lg-6 col-sm-12" align="right">
                        <a class="btn btn-rounded text-white btn-primary" href="{{ route('backend.payments.index') }}">
                            <i class="fa fa-list"></i> รายการแจ้งชำระ
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post"
                    action="{{ Request::is('*edit') ? route('backend.payments.update',["id" => $results->id]) : route('backend.payments.store') }}"
                    class="tab-wizard wizard-circle" enctype="multipart/form-data">
                    @csrf
                    @if(Request::is('*edit'))
                    <input type="hidden" name="_method" value="PUT">
                    @endif
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">จำนวนเงิน: </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ isset($results->name)?$results->name:''}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">หลักฐาน: </label>
                                    <input type="file" class="form-control" id="name" name="name"
                                        value="{{ isset($results->name)?$results->name:''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">วันที่แจ้งชำระ: </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ isset($results->name)?$results->name:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">ธนาคาร: </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ isset($results->name)?$results->name:''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">เลขที่คำสั่งซื้อ: </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ isset($results->name)?$results->name:''}}">

                                </div>
                            </div>

                        </div>
                        <div class="col-md-2 mt-25">
                            <button type="submit" name="submit" id="submit" class="btn btn-rounded text-white"
                                style="background-color: #00be00;">บันทึก
                            </button>
                        </div>
                    </section>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@stop