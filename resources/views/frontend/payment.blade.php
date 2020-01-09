@extends('frontend.layouts.main')
@section('title','แจ้งชำระเงิน')
@section('content')
    <form class="mt-5" method="post" enctype="multipart/form-data">
        @csrf
        <div class="main-container no-sidebar">
            <div class="container w-md-50">
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><i class="fa fa-money"></i> แจ้งชำระเงิน</h3>
                        </div>
                        <div class="col-sm-12" align="center">
                            <img src="https://solarnature.co.th/account.jpg" style="height: 300px;">
                        </div>
                        <div class="col-sm-12 mt-5">
                            <div class="row form-group">
                                <div class="col-sm-12 form-group">
                                    <label>เลขอ้างอิงคำสั่งซื้อ</label>
                                    <input class="form-control" type="text" name="reference" required {{ request()->reference ? 'readonly':'' }}
                                        placeholder="" value="{{ request()->reference ? request()->reference:'' }}">
                                </div>
                                <div class="col-sm-12 col-md-6 form-group">
                                    <label>จำนวนเงิน</label>
                                    <input class="form-control" type="number" name="amount" {{ request()->amount ? 'readonly':'' }} value="{{ request()->amount ? request()->amount:'' }}" required placeholder="0">
                                </div>
                                <div class="col-sm-12 col-md-6 form-group">
                                    <label>วันเวลาที่โอนเงิน</label>
                                    <input class="form-control" type="datetime-local" name="transfer_at" placeholder="วันเวลาที่โอน" value="{{ date_format(\Carbon\Carbon::now(),'Y-m-d\TH:i') }}">
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label>หลักฐานการโอนเงิน</label>
                                    <input class="form-control" type="file" name="slip" required placeholder="หลักฐาน">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="button btn-primary medium" style="width: 100%;">
                                ส่งการชำระเงิน
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
