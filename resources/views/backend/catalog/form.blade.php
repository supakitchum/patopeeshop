@extends('backend.layouts.main')
@section('title','หมวดหมู่')
@section('page_name','หมวดหมู่')
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
                        <h3 class="box-title">แก้ไขหมวดหมู่</h3>
                        @else
                        <h3 class="box-title">เพิ่มหมวดหมู่</h3>
                        @endif

                    </div>
                    <div class="col-lg-6 col-sm-12" align="right">
                        <a class="btn btn-rounded text-white btn-primary" href="{{ route('backend.catalogs.index') }}">
                            <i class="fa fa-list"></i> รายการหมวดหมู่
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post"
                    action="{{ Request::is('*edit') ? route('backend.catalogs.update',["id" => $results->id]) : route('backend.catalogs.store') }}"
                    class="tab-wizard wizard-circle" enctype="multipart/form-data">
                    @csrf
                    @if(Request::is('*edit'))
                    <input type="hidden" name="_method" value="PUT">
                    @endif
                    <section>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">หมวดหมู่:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ isset($results->name)?$results->name:''}}">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">หมวดหมู่:</label>
                                    <input type="file" class="form-control" name="photo">

                                </div>
                            </div>
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
