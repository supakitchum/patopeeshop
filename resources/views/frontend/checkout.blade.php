@extends('frontend.layouts.main')
@section('title','ชำระเงิน')
@section('content')
    <form method="post">
        @csrf
        <div class="main-container no-sidebar">
            <div class="container">
                <div class="main-content">
                    <div class="page-title">
                        <h3>ชำระเงิน</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-checkout text-border">
                                <h5 class="form-title">ระบบสมาชิก</h5>
                                <div class="row margin-bottom-60">
                                    @if(isset(auth()->user()->id))
                                        <div class="col-sm-12">
                                            <p class="text-left">
                                                ชื่อ {{ auth()->user()->fname .' '.auth()->user()->lname }}<br>
                                                @if(isset($address->district))
                                                    {{ auth()->user()->address }} {{ 'ต.'. $address->district}} {{ 'อ.'. $address->amphoe}} {{ 'จ.'. $address->province}}
                                                    <br>
                                                    {{ auth()->user()->zip_code}}<br>
                                                    {{ 'เบอร์โทร.'. auth()->user()->phone}}
                                                @else
                                                    ที่อยู่ ไม่พบข้อมูล
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-sm-12" align="left">
                                            <a href="{{ route('profile.index') }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i>
                                                แก้ไขที่อยู่นี้
                                            </a>
                                            <button type="button" class="btn btn-success" onclick="useAddress()"><i
                                                    class="fa fa-check"></i> ใช้ที่อยู่นี้
                                            </button>
                                            <script>
                                                async function useAddress() {
                                                    $('#fname').val('{{ auth()->user()->fname }}')
                                                    $('#lname').val('{{ auth()->user()->lname }}')
                                                    $('#address').val('{{ auth()->user()->address }}')
                                                    $('#input_province').val({{ auth()->user()->province }})
                                                    await $('#input_province').trigger("chosen:updated");
                                                    await showAmphoes();
                                                    await $('#input_amphoe').val({{ auth()->user()->amphoe }});
                                                    await $('#input_amphoe').trigger("chosen:updated");
                                                    await showDistricts();
                                                    await $('#input_district').val({{ auth()->user()->district }});
                                                    await $('#input_district').trigger("chosen:updated");
                                                    $('#input_zipcode').val('{{auth()->user()->zip_code}}')
                                                    $('#phone').val('{{ auth()->user()->phone }}')
                                                }
                                            </script>
                                        </div>
                                    @else
                                        <div class="col-sm-12">
                                            <p><a href="#" data-toggle="modal" data-target="#loginModal"
                                                  class="btn btn-success" style="width: 100%">เข้าสู่ระบบด้วย
                                                    บัญชีประตูผี</a></p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>
                                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"
                                                   style="width: 100%">เข้าสู่ระบบด้วย facebook</a>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-checkout">
                                <h5 class="form-title">ที่อยู่ในการจัดส่ง</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p><input type="text" id="fname" name="fname" required placeholder="ชื่อ"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><input type="text" id="lname" name="lname" required placeholder="นามสกุล">
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p><input type="email" name="email" placeholder="Email Address" required
                                                  value="{{ isset(auth()->user()->email) ? auth()->user()->email : ''}}"
                                                  style="width: 100%;"></p>
                                    </div>
                                </div>
                                <p><input id="address" name="address" type="text" required placeholder="ที่อยู่"></p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>
                                            <select id="input_province" required name="province"
                                                    onchange="showAmphoes()">
                                                <option value="">กรุณาเลือกจังหวัด</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>
                                            <select id="input_amphoe" required name="amphoe" onchange="showDistricts()">
                                                <option value="">กรุณาเลือกอำเภอ</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>
                                            <select id="input_district" required name="district"
                                                    onchange="showZipcode()">
                                                <option value="">กรุณาเลือกตำบล</option>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p><input type="text" required name="zip_code" id="input_zipcode"
                                                  placeholder="รหัสไปรษณีย์"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><input type="text" required name="phone" id="phone"
                                                  placeholder="เบอร์โทรศัพท์"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <hr>
                            <div class="form-checkout order">
                                <h5 class="form-title">คำสั่งซื้อของคุณ</h5>
                                <table class="shop-table order">
                                    <thead>
                                    <tr>
                                        <th class="product-name">สินค้า</th>
                                        <th class="total">รวม</th>
                                    </tr>
                                    </thead>
                                    <tbody id="order-detail">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <hr>
                            <div class="form-checkout checkout-payment">
                                <h5 class="form-title">วิธีการชำระเงิน</h5>

                                <div class="payment_methods">

                                    <div class="payment_method">
                                        <label><input checked name="payment_method" type="radio" value="1">โอนผ่านธนาคาร</label>
                                        <div class="payment_box">
                                            <p><img src="https://rock.in.th/65467176_372895336917578_4910815737381126144_n.png"></p>
                                            กรุณาโอนเงินมาที่ : 051-8-51290-0 (บจก. ประตูผี) <br>
                                            เมื่อโอนเงินสำเร็จกรุณาแจ้งชำระเงินพร้อมหลักฐานที่ : <a href="/payment">แจ้งชำระเงิน</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="button btn-primary medium" style="width: 100%;">
                                ยืนยันคำสั่งซื้อ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            showProvinces();
        });

        async function ajax(url, callback) {
            await $.ajax({
                "url": url,
                "type": "GET",
                "dataType": "json",
            })
                .done(callback); //END AJAX
        }

        async function showProvinces() {
            //PARAMETERS
            var url = "/api/province";
            var callback = await function (result) {
                $("#input_province").empty();
                for (var i = 0; i < result.length; i++) {
                    $("#input_province").append(
                        $('<option></option>')
                            .attr("value", "" + result[i].province_code)
                            .html("" + result[i].province)
                    );
                }
                $("#input_province").trigger("chosen:updated");
                return showAmphoes();
            };
            //CALL AJAX
            await ajax(url, callback);
        }

        async function showAmphoes() {
            //INPUT
            var province_code = $("#input_province").val();
            //PARAMETERS
            var url = "/api/province/" + province_code + "/amphoe";
            var callback = await function (result) {
                //console.log(result);
                $("#input_amphoe").empty();
                for (var i = 0; i < result.length; i++) {
                    $("#input_amphoe").append(
                        $('<option></option>')
                            .attr("value", "" + result[i].amphoe_code)
                            .html("" + result[i].amphoe)
                    );
                }
                $("#input_amphoe").trigger("chosen:updated");
                return showDistricts();
            };
            //CALL AJAX
            await ajax(url, callback);
        }

        async function showDistricts() {
            //INPUT
            var province_code = $("#input_province").val();
            var amphoe_code = $("#input_amphoe").val();
            //PARAMETERS
            var url = "/api/province/" + province_code + "/amphoe/" + amphoe_code + "/district";
            var callback = await function (result) {
                //console.log(result);
                $("#input_district").empty();
                for (var i = 0; i < result.length; i++) {
                    $("#input_district").append(
                        $('<option></option>')
                            .attr("value", "" + result[i].district_code)
                            .html("" + result[i].district)
                    );
                }
                $("#input_district").trigger("chosen:updated");
                return showZipcode();
            };
            //CALL AJAX
            await ajax(url, callback);
        }

        async function showZipcode() {
            //INPUT
            var province_code = $("#input_province").val();
            var amphoe_code = $("#input_amphoe").val();
            var district_code = $("#input_district").val();
            //PARAMETERS
            var url = "/api/province/" + province_code + "/amphoe/" + amphoe_code + "/district/" + district_code;
            var callback = await function (result) {
                //console.log(result);
                for (var i = 0; i < result.length; i++) {
                    $("#input_zipcode").val(result[i].zipcode);
                }
                return true;
            };
            //CALL AJAX
            await ajax(url, callback);
        }
    </script>
@endsection
