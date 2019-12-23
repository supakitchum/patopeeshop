<!DOCTYPE html>
<html lang="th">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>{{ get_title() }}</title>
    @include('frontend.layouts.css')
</head>
<body class="woocommerce-active {{ Request::is('/') ? 'page-template-template-homepage-v6':'single-product left-sidebar normal' }}">
<div id="page" class="hfeed site">
    @include('frontend.layouts.navbar')
    <div id="content" class="site-content" tabindex="-1">
        @yield('content')
    </div>
    @include('frontend.layouts.footer')
</div>
<div id="addOrderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <input type="hidden" id="photo" value="{{ \Request::is('product/*') ? asset($images[0]->path):'' }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-12 text-center" style="position: absolute;">
                        <h4 class="modal-title" id="name_product"></h4>
                    </div>
                    <div class="col-sm-12 text-right">
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
                            <label>จำนวน (เหลือ : <span id="quality">0</span>)</label>
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
                <button type="button" data-name="test" data-dismiss="modal" data-price="0"
                        class="btn btn-info waves-effect add-to-cart"><i
                        class="fa fa-shopping-cart"></i> เพิ่มลงรถเข็น
                </button>
            </div>
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
                <div class="row">
                    <div class="col-sm-12 text-center" style="position: absolute;">
                        <h4 class="modal-title" id="name_product">เข้าสู่ระบบ</h4>
                    </div>
                    <div class="col-sm-12 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>
                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"
                               style="width: 70%"><i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook</a>
                        </p>
                        <p>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"
                               style="width: 70%"><i class="fa fa-google"></i> เข้าสู่ระบบด้วย Google</a>
                        </p>
                        <hr>
                    </div>
                    <div class="col-sm-12 text-center">
                        @if ($errors->any() && session('page') == "login")
                            <div class="col-lg-12">
                                <div class="alert alert-danger text-left" style="padding-left: 10%;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <form action="/login" method="post">
                            @csrf
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
                                    <button class="btn btn-success" type="submit">เข้าสู่ระบบ</button>
                                    <span><a href="">ลืมรหัสผ่าน</a> </span>
                                </div>
                                <div class="col-sm-12">
                                    <hr>
                                    <p>ยังไม่มีบัญชี ? <a href="#" data-toggle="modal" data-dismiss="modal"
                                                          data-target="#registerModal">สมัครสมาชิก</a></p>
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
<div id="registerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h4 class="modal-title" id="name_product" style="position: absolute;">สมัครสมาชิก</h4>
                    </div>
                    <div class="col-sm-12 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>
                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"
                               style="width: 70%"><i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook</a>
                        </p>
                        <p>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"
                               style="width: 70%"><i class="fa fa-google"></i> เข้าสู่ระบบด้วย Google</a>
                        </p>
                        <hr>
                    </div>
                    <div class="col-sm-12 text-center">
                        <form id="register-form" action="/register" method="post">
                            <div class="row">
                                <h5>สมัครสมาชิกประตูผี</h5>
                            </div>
                            @csrf
                            @if ($errors->any() && session('page') == "register")
                                <div class="col-lg-12">
                                    <div class="alert alert-danger text-left" style="padding-left: 10%;">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-4">
                                    <label>อีเมล</label>
                                </div>
                                <div class="col-sm-8">
                                    <input required type="email" name="email" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-4">
                                    <label>ชื่อจริง</label>
                                </div>
                                <div class="col-sm-8">
                                    <input required type="text" value="{{ old('fname') ? old('fname'):'' }}"
                                           name="fname" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-4">
                                    <label>นามสกุล</label>
                                </div>
                                <div class="col-sm-8">
                                    <input required type="text" name="lname"
                                           value="{{ old('lname') ? old('lname'):'' }}" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-4">
                                    <label>รหัสผ่าน</label>
                                </div>
                                <div class="col-sm-8">
                                    <input required type="password" id="password" name="password" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-4">
                                    <label>ยืนยันรหัสผ่าน</label>
                                </div>
                                <div class="col-sm-8">
                                    <input required type="password" name="password_confirmation" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-success" type="submit">ยืนยัน</button>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <hr>
                                    <p>มีบัญชีแล้ว ? <a href="#" data-toggle="modal" data-dismiss="modal"
                                                        data-target="#loginModal">เข้าสู่ระบบ</a></p>
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
@if(session('page') == "login" && !isset(auth()->user()->id))
    <script>
        $('#loginModal').modal('show');
    </script>
@elseif(session('page') == "register")
    <script>
        $('#registerModal').modal('show');
    </script>
@endif
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

