@extends('frontend.layouts.main')
@section('title','ระบบสมาชิก')
@section('content')
    <div class="col-full mt-5">
        <div class="row">
            <div class="col-sm-12">
                <nav class="woocommerce-breadcrumb">
                </nav>
            </div>
            <!-- .woocommerce-breadcrumb -->
            <div class="col-sm-12">
                <div id="primary" class="content-area" style="max-width: 100% !important;">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <div class="entry-content">
                                <div class="woocommerce">
                                    <div class="customer-login-form">
                                        <span class="or-text">หรือ</span>
                                        <div id="customer_login" class="u-columns col2-set col2-set-sm p-0-sm">
                                            <div class="u-column1 col-1 p-0-sm">
                                                <h2>เข้าสู่ระบบ</h2>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 mb-3">
                                                        <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"
                                                           style="width: 100%;background-color: #007bff;border-color: #007bff;"><i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook</a>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 mb-3">
                                                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"
                                                           style="width: 100%"><i class="fa fa-google"></i> เข้าสู่ระบบด้วย Google</a>
                                                    </div>
                                                </div>
                                                <form method="post" action="{{ route('login') }}" class="woocomerce-form woocommerce-form-login login">
                                                    @csrf
                                                    <p class="form-row form-row-wide">
                                                        <label for="username">อีเมล
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" class="input-text" name="email" id="username" value="" />
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="password">รหัสผ่าน
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input class="input-text" type="password" name="password" id="password" />
                                                    </p>
                                                    <p class="form-row">
                                                        <input class="woocommerce-Button button" type="submit" value="เข้าสู่ระบบ" name="login">
                                                        <label for="rememberme" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> จดจำฉัน
                                                        </label>
                                                    </p>
                                                    <p class="woocommerce-LostPassword lost_password">
                                                        <a href="#">ลืมรหัสผ่าน ?</a>
                                                    </p>
                                                </form>
                                                <!-- .woocommerce-form-login -->
                                            </div>
                                            <!-- .col-1 -->
                                            <div class="u-column2 col-2">
                                                <h2>สมัครสมาชิก</h2>
                                                <form class="register" action="{{ route('register') }}" method="post">
                                                    @csrf
                                                    <p class="before-register-text">
                                                        สร้างบัญชีกับเราสิ เพียงกรอกข้อมูลด้านล่างนี้ให้ครบถ้วนเท่านั้น
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_email">ชื่อจริง
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" value="" required name="fname" class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_email">นามสกุล
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" value="" required name="lname" class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_email">อีเมล
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="email" value="" required id="reg_email" name="email" class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_password">รหัสผ่าน
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="password" required id="reg_password" name="password" class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_password">ยืนยันรหัสผ่าน
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="password" required id="reg_password" name="password_confirmation" class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row">
                                                        <input type="submit" class="woocommerce-Button button w-100" name="register" value="สมัครสมาชิก" />
                                                    </p>
                                                    <div class="register-benefits">
                                                        <h3>สมัครวันนี้ ได้อะไร? :</h3>
                                                        <ul>
                                                            <li>ได้ความสะดวกสำหรับการชำระเงิน</li>
                                                            <li>ติดตามคำสั่งซื้อได้ง่าย</li>
                                                            <li>เก็บข้อมูลการจ่ายเงินของท่านทั้งหมด</li>
                                                        </ul>
                                                    </div>
                                                </form>
                                                <!-- .register -->
                                            </div>
                                            <!-- .col-2 -->
                                        </div>
                                        <!-- .col2-set -->
                                    </div>
                                    <!-- .customer-login-form -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .entry-content -->
                        </div>
                        <!-- .hentry -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
@endsection
