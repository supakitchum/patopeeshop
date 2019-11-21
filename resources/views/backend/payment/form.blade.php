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
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img id="img-zoom-modal" src="sdfsdfsdf" alt="" class="img-fluid" width="550px">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
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
                                    <input type="text" class="form-control" id="amount" name="amount"
                                        value="{{ isset($results->amount)?$results->amount:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">ธนาคาร: </label>
                                    <input type="text" class="form-control" id="bank" name="bank"
                                        value="{{ isset($results->bank)?$results->bank:'ธนาคารไทยพาณิชย์ เลขที่บัญชี 586-5654-5642'}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">เลขที่คำสั่งซื้อ: </label>
                                    <input type="text" class="form-control" id="order_id" name="order_id"
                                        value="{{ isset($results->order_id)?$results->order_id:''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-datetime-local-input">วันที่แจ้งชำระ:</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="datetime-local"
                                            value="{{ isset($results->transfer_at)? date_format($results->transfer_at,'Y-m-d\TH:i'):date_format(\Carbon\Carbon::now(),'Y-m-d\TH:i') }}"
                                            name="transfer_at" id="example-datetime-local-input">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="name">หลักฐาน: </label>
                                    <input type="file" class="form-control" id="slip" name="slip" value="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <img data-toggle="modal" data-target="#myModal" class="model_img img-fluid"
                                    id="profile-img" src="" height="100" width="100">
                            </div>

                        </div>

                        <div class="col-lg-12 col-sm-12" align="right">
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
@section('script')
<script>
$(function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#profile-img').attr('src', e.target.result);
            $('#profile-img').attr('data-src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $("#slip").change(function() {
        readURL(this);
    });
});
$(document).on('show.bs.modal', '.modal', function(e) {
    var img = $(e.relatedTarget).data('src');
    // alert(img);
    $(".modal-body #img-zoom-modal").attr('src', img);
});
</script>
@stop