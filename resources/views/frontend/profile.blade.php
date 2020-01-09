@extends('frontend.layouts.main')
@section('title','บัญชีของฉัน')
@section('content')
    <div class="main-container no-sidebar mt-5">
        <div class="container">
            <div class="main-content">
                <div class="row">
                    @isset(auth()->user()->provider)
                        <div class="col-sm-4">
                            <div class="text-border">
                                บัญชีจาก : {{ strtoupper(auth()->user()->provider) }}
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4">
                            <form action="{{ route('profile.update',['id' => auth()->user()->id]) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-checkout text-border">
                                    <h5 class="form-title">เปลี่ยนรหัสผ่าน</h5>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p><input type="password" style="width: 100%;" required id="old-password" name="old-password"
                                                      placeholder="รหัสผ่านเก่า"></p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p><input type="password" style="width: 100%;" required id="password" name="password"
                                                      placeholder="รหัสผ่านใหม่"></p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p><input type="password" style="width: 100%;" required id="password_confirmation" name="password_confirmation"
                                                      placeholder="ยืนยันรหัสผ่านใหม่"></p>
                                        </div>
                                        <div class="col-sm-12 text-right">
                                            <button class="btn btn-success w-100">บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="col-sm-8">
                        <form action="{{ route('profile.update',['id' => auth()->user()->id]) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-checkout text-border" style="text-align: left !important;">
                                <h5 class="form-title text-center">ข้อมูลส่วนตัว/ที่อยู่ในการจัดส่ง</h5>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>ชื่อ</label>
                                        <p><input class="w-100" type="text"
                                                  value="{{ isset(auth()->user()->fname) ? auth()->user()->fname:''}}"
                                                  id="fname" name="fname" required placeholder="ชื่อ"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>นามสกุล</label>
                                        <p><input class="w-100" type="text"
                                                  value="{{ isset(auth()->user()->lname) ? auth()->user()->lname:''}}"
                                                  id="lname" name="lname" required placeholder="นามสกุล"></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>อีเมล</label>
                                        <p><input class="w-100" type="email" name="email" disabled placeholder="Email Address" required
                                                  value="{{ isset(auth()->user()->email) ? auth()->user()->email : ''}}"
                                                  style="width: 100%;"></p>
                                    </div>
                                </div>
                                <label>ที่อยู่</label>
                                <p><input id="address" class="w-100"
                                          value="{{ isset(auth()->user()->address) ? auth()->user()->address:''}}"
                                          name="address" type="text" required placeholder="ที่อยู่"></p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>จังหวัด</label>
                                        <p>
                                            <select class="w-100" id="input_province" required name="province" onchange="showAmphoes()">
                                                <option value="">กรุณาเลือกจังหวัด</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>อำเภอ</label>
                                        <p>
                                            <select class="w-100" id="input_amphoe" required name="amphoe" onchange="showDistricts()">
                                                <option value="">กรุณาเลือกอำเภอ</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>ตำบล</label>
                                        <p>
                                            <select class="w-100" id="input_district" required name="district" onchange="showZipcode()">
                                                <option value="">กรุณาเลือกตำบล</option>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>รหัสไปรษณีย์</label>
                                        <p><input type="text" class="w-100"
                                                  value="{{ isset(auth()->user()->zip_code) ? auth()->user()->zip_code:''}}"
                                                  required name="zip_code" id="input_zipcode" placeholder="รหัสไปรษณีย์">
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>เบอร์โทร.</label>
                                        <p><input type="text" class="w-100"
                                                  value="{{ isset(auth()->user()->phone) ? auth()->user()->phone:''}}"
                                                  required name="phone" id="phone" placeholder="เบอร์โทรศัพท์"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-success w-100">บันทึก</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            @if(isset(auth()->user()->province))
            address();
            @else
            showProvinces();
            @endif
        });

        async function address() {
            await showProvinces();
            $('#input_province').val({{ auth()->user()->province }})
            await $('#input_province').trigger("chosen:updated");
            await showAmphoes();
            await $('#input_amphoe').val({{ auth()->user()->amphoe }});
            await $('#input_amphoe').trigger("chosen:updated");
            await showDistricts();
            await $('#input_district').val({{ auth()->user()->district }});
            await $('#input_district').trigger("chosen:updated");
        }

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
