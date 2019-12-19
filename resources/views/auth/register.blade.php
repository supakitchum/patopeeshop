@extends('frontend.layouts.main')
@section('title','คำสั่งซื้อ')
@section('content')
<div class="container">
    <div class="row">
        <div class="main-content col-sm-12">
            <form>
                <div class="row">
                    <h5>ระบบสมาชิกประตูผี</h5>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-4">
                        <label>อีเมล</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="email" name="email" style="width: 100%;">
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-4">
                        <label>รหัสผ่าน</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="password" name="password" style="width: 100%;">
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-success">เข้าสู่ระบบ</button>
                        <span><a href="">ลืมรหัสผ่าน</a> </span>
                    </div>
                    <div class="col-sm-12 text-center">
                        <hr>
                        <p>มีบัญชีแล้ว ? <a href="/register">เข้าสู่ระบบ</a> </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
