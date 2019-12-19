@extends('backend.layouts.main')
@section('title','แก้ไขสมาชิก')
@section('page_name','สมาชิก')
@section('sub_page_name','(แก้ไข)')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">ข้อมูลของสมาชิก</h3>
                        </div>

                        <div class="col-lg-6 col-sm-12" align="right">
                            <a class="btn btn-primary btn-rounded text-white"
                               href="{{ route('backend.customers.index') }}">
                                <i class="fa fa-list"></i> รายการ
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body with-border">
                    <form action="{{ route('backend.customers.update',['id' => $result->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">อีเมล : </label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" type="email" value="{{ $result->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">ชื่อ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="fname" name="fname"
                                       value="{{ $result->fname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">นามสกุล : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->lname }}"
                                       id="lname" name="lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">ที่อยู่ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->address }}"
                                       id="address" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="province" class="col-sm-2 col-form-label">จังหวัด : </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="input_province" required name="province"
                                        onchange="showAmphoes()">
                                    <option value="">กรุณาเลือกจังหวัด</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input_amphoe" class="col-sm-2 col-form-label">อำเภอ : </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="input_amphoe" required name="amphoe" onchange="showDistricts()">
                                    <option value="">กรุณาเลือกอำเภอ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="district" class="col-sm-2 col-form-label">ตำบล : </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="input_district" required name="district"
                                        onchange="showZipcode()">
                                    <option value="">กรุณาเลือกตำบล</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip_code" class="col-sm-2 col-form-label">รหัสไปรษณีย์ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required value="{{ $result->zip_code }}"
                                       id="input_zipcode" name="zip_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12" align="right">
                                <button type="submit" class="btn btn-success btn-rounded">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">เปลี่ยนรหัสผ่าน</h3>
                </div>
                <div class="box-body with-border">
                    <form action="{{ route('backend.customers.update',['id' => $result->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">รหัสผ่านใหม่ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="password" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">ยืนยันรหัสผ่านใหม่
                                : </label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="password" id="password_confirmation"
                                       name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12" align="right">
                                <button type="submit" class="btn btn-success btn-rounded">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        async function useAddress() {
            await showProvinces();
            await $('#input_province').val({{ $result->province }})
            await showAmphoes();
            await $('#input_amphoe').val({{ $result->amphoe }});
            await showDistricts();
            await $('#input_district').val({{ $result->district }});
        }

        $(document).ready(function () {
            {{ isset($result->province) ? 'useAddress();':'showProvinces()'}}
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
