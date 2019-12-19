@extends('frontend.layouts.main')
@section('title','แจ้งชำระเงิน')
@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="main-container no-sidebar">
            <div class="container w-md-50">
                <div class="main-content">
                    <div class="page-title">
                        <h3>แจ้งชำระเงิน</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-checkout text-border">
                                <p>กรุณาโอนเงินมาที่</p>
                                <p><img src="https://rock.in.th/65467176_372895336917578_4910815737381126144_n.png"></p>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-checkout text-border">
                                <div class="row margin-bottom-60">
                                    <div class="col-sm-12">
                                        <p><input type="text" name="reference" required {{ request()->reference ? 'readonly':'' }}
                                                  placeholder="เลขอ้างอิงคำสั่งซื้อ" value="{{ request()->reference ? request()->reference:'' }}"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><input type="text" name="amount" {{ request()->amount ? 'readonly':'' }} value="{{ request()->amount ? request()->amount:'' }}" required placeholder="จำนวนเงิน">
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><input type="datetime-local" style="height: 3.8rem;width: 100%;" class="border-sm" name="transfer_at"
                                                  placeholder="วันเวลาที่โอน" value="{{ date_format(\Carbon\Carbon::now(),'Y-m-d\TH:i') }}">
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><input type="file" name="slip" required placeholder="หลักฐาน" class="border-sm">
                                        </p>
                                    </div>
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
