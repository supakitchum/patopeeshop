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
                                       data-title="{{ $product->name }}" data-target="#addOrderModal">
                                        <i class="fa fa-plus"></i> หยิบลงตะกร้า
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
                <div class="modal-body">
                    <h4>เลือกรายละเอียดเพิ่มเติม</h4>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>ขนาด</label>
                                <select class="form-control" name="size">
                                    <option>S</option>
                                    <option>M</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>สี</label>
                                <select class="form-control" name="color">
                                    <option>ดำ</option>
                                    <option>แดง</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>จำนวน</label>
                                <input type="number" min="1" id="amount"
                                       name="quality"
                                       class="form-control" onchange="calculate()" required value="0">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>ราคา</label>
                                <input id="price" disabled type="number"
                                       class="form-control" value="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" align="right">
                    ราคารวม : <span id="total">0</span>บาท
                    <button type="button" data-name="test" data-dismiss="modal" data-price="100" class="btn btn-info waves-effect add-to-cart"><i
                            class="fa fa-shopping-cart"></i> เพิ่มลงตะกร้า
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
                <div class="modal-body">
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
                    <div>ราคารวม : <span class="total-cart"></span> บาท</div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary">เพิ่มคำสั่งซื้อ</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).on('show.bs.modal', '.modal', function (e) {
            var title = $(e.relatedTarget).data('title')
            $('#name_product').html(title);
            $("#amount").val(0)
            $("#price").val(100)
        });
    </script>
    <script src="{{ asset("js/cart.js") }}" type="text/javascript"></script>
@stop
