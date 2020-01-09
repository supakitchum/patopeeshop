@extends('frontend.layouts.main')
@section('title','แจ้งปัญหา')
@section('content')
    <form class="mt-5" method="post" enctype="multipart/form-data">
        @csrf
        <div class="main-container no-sidebar">
            <div class="container w-md-50">
                <div class="main-content">
                    <div class="row form-group">
                        <div class="col-sm-12 form-group">
                            <h3><i class="fa fa-warning"></i> แจ้งปัญหา</h3>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>หัวข้อปัญหา</label>
                            <input class="form-control" type="text" name="title" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>เลขอ้างอิงคำสั่งซื้อ</label>
                            <input class="form-control" type="text" name="order_ref" {{ request()->reference ? 'readonly':'' }}
                                value="{{ request()->reference ? request()->reference:'' }}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>อีเมลติดต่อกลับ</label>
                            <input class="form-control" type="email" class="w-100" name="email" required value="{{ isset(auth()->user()->email)? auth()->user()->email:'' }}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>เบอร์โทร.</label>
                            <input class="form-control" type="text" name="phone" required value="{{ isset(auth()->user()->phone)? auth()->user()->phone:'' }}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>รายละเอียดปัญหา</label>
                            <textarea class="form-control" name="detail" class="w-100"></textarea>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="button btn-primary medium" style="width: 100%;">
                                ส่งปัญหา
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
