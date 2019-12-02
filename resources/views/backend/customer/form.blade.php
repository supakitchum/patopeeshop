@extends('backend.layouts.main')
@section('title','แก้ไขสมาชิก')
@section('page_name','สมาชิก')
@section('sub_page_name','(แก้ไข)')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">ข้อมูลของสมาชิก</h3>
                        </div>

                        <div class="col-lg-6 col-sm-12" align="right">
                            <a class="btn btn-primary btn-rounded text-white"
                               href="{{ route('backend.customers.index') }}">
                                <i class="fa fa-list"></i> รายการ
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body with-border">
                    <form action="{{ route('backend.customers.update',['id' => $result->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">อีเมล : </label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" type="email" value="{{ $result->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">ชื่อ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="fname" name="fname" value="{{ $result->fname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">นามสกุล : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->lname }}"
                                       id="lname" name="lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">ที่อยู่ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->address }}"
                                       id="address" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="district" class="col-sm-2 col-form-label">ตำบล : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->district }}"
                                       id="district" name="district">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="province" class="col-sm-2 col-form-label">จังหวัด : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->province }}"
                                       id="province" name="province">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip_code" class="col-sm-2 col-form-label">รหัสไปรษณีย์ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->zip_code }}"
                                       id="zip_code" name="zip_code">
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
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">เปลี่ยนรหัสผ่าน</h3>
                </div>
                <div class="box-body with-border">
                    <form action="{{ route('backend.customers.update',['id' => $result->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">รหัสผ่านใหม่ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="password" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">ยืนยันรหัสผ่านใหม่ : </label>
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
    </div>
@stop
