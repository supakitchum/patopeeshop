@extends('frontend.layouts.main')
@section('title','แจ้งปัญหา')
@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="main-container no-sidebar">
            <div class="container w-md-50">
                <div class="main-content">
                    <div class="page-title">
                        <h3>แจ้งปัญหา</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-checkout text-border">
                                <div class="row margin-bottom-60 text-left">
                                    <div class="col-sm-12">
                                        <label>หัวข้อปัญหา</label>
                                        <p><input type="text" name="title" required></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>เลขอ้างอิงคำสั่งซื้อ</label>
                                        <p><input type="text" name="order_ref" {{ request()->reference ? 'readonly':'' }}
                                            value="{{ request()->reference ? request()->reference:'' }}"></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>อีเมลติดต่อกลับ</label>
                                        <p><input type="email" class="w-100" name="email" required value="{{ isset(auth()->user()->email)? auth()->user()->email:'' }}"></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>เบอร์โทร.</label>
                                        <p><input type="text" name="phone" required value="{{ isset(auth()->user()->email)? auth()->user()->email:'' }}"></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>รายละเอียดปัญหา</label>
                                        <p><textarea name="detail" class="w-100"></textarea></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="button btn-primary medium" style="width: 100%;">
                                            ส่งปัญหา
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
