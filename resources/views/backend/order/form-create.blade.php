@extends('backend.layouts.main')
@section('title','คำสั่งซื้อ')
@section('page_name','คำสั่งซื้อ')
@section('sub_page_name','(เพิ่มคำสั่งซื้อ)')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายละเอียดรายการคำสั่งซื้อ</h3>
                        </div>
                        <div class="col-lg-6" align="right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart"></i> รถเข็นของฉัน (<span
                                    class="total-count"></span>)
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="product-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <th>รหัสสินค้า</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td align="center"><img
                                        src="{{ isset($images->images($product->id)[0]->path) ? asset($images->images($product->id)[0]->path):'http://localhost:8000/uploads/5dd3abed1267e_1574153197.jpg' }}"
                                        width="150px"></td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <a class="btn btn-rounded btn-primary w-100 text-white" data-toggle="modal"
                                       data-title="{{ $product->name }}" data-product-id="{{ $product->id }}" data-target="#addOrderModal">
                                        <i class="fa fa-plus"></i> เพิ่มลงรถเข็น
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div id="addOrderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="name_product"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <input type="hidden" name="aid" value="" id="aid">
                <div class="modal-body">
                    <h4>เลือกรายละเอียดเพิ่มเติม</h4>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>ขนาด</label>
                                <select class="form-control" id="size" name="size">
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>สี</label>
                                <select disabled class="form-control" id="color" name="color">
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>จำนวน</label>
                                <input disabled type="number" min="1" id="amount"
                                       name="quality"
                                       class="form-control" onchange="calculate()" required value="1">
                            </div>
                        </div>
                        <div class="col-3">
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


    <!-- Modal -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ตะกร้าของฉัน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('backend.orders.store') }}" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ชื่อสินค้า</th>
                                        <th>ราคาต่อชิ้น (บาท)</th>
                                        <th>จำนวน</th>
                                        <th>ราคารวม (บาท)</th>
                                    </tr>
                                    </thead>
                                    <tbody class="show-cart">

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <div class="container">
                                    <h3 class="text-center"><b>ข้อมูลลูกค้า</b></h3>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">อีเมล : </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" required name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 col-form-label">ชื่อ : </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" required type="text" id="fname" name="fname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 col-form-label">นามสกุล : </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" required
                                                   id="lname" name="lname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">ที่อยู่ : </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" required
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
                                            <input class="form-control" type="text" required
                                                   id="input_zipcode" name="zip_code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">เบอร์โทร. : </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" required name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">คำสั่งซื้อจาก : </label>
                                        <div class="col-sm-10">
                                            <select name="platform" class="form-control">
                                                <option value="1">Facebook</option>
                                                <option value="2">Line</option>
                                                <option value="3">WebSite</option>
                                                <option value="4">Store</option>
                                                <option value="5">อื่นๆ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer w-100" align="right">
                        @csrf
                        <p>ราคารวม : <span class="total-cart"></span> บาท</p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" onclick="" class="btn btn-primary">ยืนยันคำสั่งซื้อ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        let details = [];
        let detail = [];
        var size = $('#size');
        var color = $('#color');
        var amount = $('#amount');
        var price = $('#price');

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
        $(document).ready(function () {
            showProvinces();
            let dataTable = $('#product-table').dataTable();
            size.on('change',function () {
                var id = $('#size option:selected').val()
                detail = details.filter(function(obj) {
                    return obj.size_id == id;
                });
                color.html('');
                amount.attr('disabled',true);
                amount.val();
                $('#total').html('0')
                price.val(0)
                color.append($("<option>").attr('value',0).text('โปรดเลือกสี'));
                $(detail).each(function() {
                    color.attr('disabled',false);
                    color.append($("<option>").attr('value',this.color_id).text(this.color_name));
                });
            })
            color.on('change',function () {
                var id = $('#color option:selected').val()
                detail = details.filter(function(obj) {
                    return obj.color_id == id;
                });
                amount.attr('disabled',false);
                amount.val(1);
                $('#aid').val(detail[0].id)
                $('#total').html(detail[0].price)
                price.val(detail[0].price)
            })
        });
        $(document).on('show.bs.modal', '.modal', function (e) {
            var title = $(e.relatedTarget).data('title')
            $('#name_product').html(title);
            $("#amount").val(0)
            $("#price").val(0)
            $.get( "/api/product/"+ $(e.relatedTarget).data('product-id'), function( data ) {
                details = data;
            });
            $.get("/api/product/" + $(e.relatedTarget).data('product-id')+'/true',function (sizes) {
                size.html('');
                size.append($("<option>").attr('value',0).text('โปรดเลือกขนาด'));
                $(sizes).each(function() {
                    size.append($("<option>").attr('value',this.size_id).text(this.size_name));
                });
            })
        });
    </script>
    <script src="{{ asset("js/cart.js") }}" type="text/javascript"></script>
@stop
