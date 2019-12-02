@extends('backend.layouts.main')
@section('title','โปรไฟล์')
@section('page_name','โปรไฟล์')
@section('sub_page_name','')
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">ข้อมูลของท่าน</h3>
                </div>
                <div class="box-body with-border">
                    <form action="{{ route('backend.profile.update',['id' => auth()->user()->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">อีเมล : </label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" type="email" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">ชื่อ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ auth()->user()->fname }}" id="fname" name="fname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">สกุล : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ auth()->user()->lname }}" id="lname" name="lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12" align="right">
                                <button type="submit" class="btn btn-success btn-rounded">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">เปลี่ยนรหัสผ่าน</h3>
                </div>
                <div class="box-body with-border">
                    <form action="{{ route('backend.profile.update',['id' => auth()->user()->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">รหัสผ่านเก่า: </label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="password" id="old-password" name="old-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">รหัสผ่านใหม่ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="password" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">ยืนยันรหัสผ่านใหม่ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="password" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12" align="right">
                                <button type="submit" class="btn btn-success btn-rounded">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@stop
