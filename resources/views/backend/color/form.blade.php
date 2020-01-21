@extends('backend.layouts.main')
@section('title','กำลังไฟ')
@section('page_name','กำลังไฟ')
@section('sub_page_name','')
@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-10 col-sm-12 mb-2">
                        @if(Request::is('*edit'))
                        <h3 class="box-title">แก้ไขกำลังไฟ</h3>
                        @else
                        <h3 class="box-title">เพิ่มกำลังไฟ</h3>
                        @endif

                    </div>
                    <div class="col-lg-2 col-sm-12" align="right">
                        <a class="btn btn-rounded text-white btn-primary w-100" href="{{ route('backend.powers.index') }}">
                            <i class="fa fa-list"></i> รายการกำลังไฟ
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post"
                    action="{{ Request::is('*edit') ? route('backend.powers.update',["id" => $results->id]) : route('backend.powers.store') }}"
                    class="tab-wizard wizard-circle" enctype="multipart/form-data">
                    @csrf
                    @if(Request::is('*edit'))
                    <input type="hidden" name="_method" value="PUT">
                    @endif
                    <section>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="name">ชื่อกำลังไฟ: </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ isset($results->name)?$results->name:''}}">

                                </div>
                            </div>
{{--                            <div class="col-md-5">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="name">โค้ดกำลังไฟ: </label>--}}
{{--                                    <input type="text" class="form-control" name="code"--}}
{{--                                           value="{{ isset($results->code)?$results->code:''}}">--}}

{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-2 mt-25">
                                <button type="submit" name="submit" id="submit" class="btn btn-rounded text-white"
                                    style="background-color: #00be00;">บันทึก
                                </button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@stop
