<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>{{ get_title() }}</title>
    @include('frontend.layouts.css')
</head>
<body class="home">
@include('frontend.layouts.navbar')
@yield('content')
@include('frontend.layouts.footer')
<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
<div id="addOrderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="name_product"></h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="aid" value="" id="aid">
            <div class="modal-body">
                <h4>เลือกรายละเอียดเพิ่มเติม</h4>
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <label for="size">ขนาด</label><br>
                            <select id="size" name="size">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>สี</label>
                            <select disabled id="color" name="color">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>จำนวน</label>
                            <input disabled type="number" min="1" id="amount"
                                   name="quality"
                                   class="form-control" onchange="calculate()" required value="1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>ราคา</label>
                            <input id="price" disabled type="number"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" align="right">
                ราคารวม : <span id="total">0</span>บาท
                <button type="button" data-name="test" data-dismiss="modal" data-price="0" class="btn btn-info waves-effect add-to-cart"><i
                        class="fa fa-shopping-cart"></i> เพิ่มลงรถเข็น
                </button>
            </div>
            <script>
                function calculate() {
                    let amount = $("#amount").val()
                    let price = $("#price").val()
                    $("#total").html(amount * price)
                }
            </script>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="name_product">ระบบสมาชิก</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>
                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"
                               style="width: 70%"><i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook</a>
                        </p>
                        <hr>
                    </div>
                    <div class="col-sm-12 text-center">
                        <form>
                            <div class="row">
                                <h5>เข้าสู่ระบบด้วยบัญชีประตูผี</h5>
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
                                <div class="col-sm-12">
                                    <hr>
                                    <p>ยังไม่มีบัญชี ? <a href="">สมัครสมาชิก</a> </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@include('frontend.layouts.js')
@yield('script')
@if (session('alert'))
    <script>
        Swal.fire(
            "{{ session('alert')['messages']['title'] }}",
            "{{ session('alert')['messages']['body'] }}",
            "{{ session('alert')['status'] }}"
        );
    </script>
@endif
</body>
</html>
