@extends('backend.layouts.main')
@section('title','จัดการสินค้า')
@section('page_name','จัดการสินค้า')
@section('sub_page_name','')
@section('content')
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Medium model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>Overflowing text to show scroll behavior</h4>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue
                        laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl
                        consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Main content -->
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <h3 class="box-title">ตัวกรองสินค้า</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <form id="form-filter" method="get">
                    <div class="box-body">
                        <label>หมวดหมู่สินค้า</label>
                        @foreach($catalogs as $index=>$catalog)
                            <div class="col-lg-12 col-sm-12">
                                <input type="checkbox" id="{{ $catalog->name }}" name="catalogs"
                                       value="{{ $catalog->id }}"
                                       class="filled-in chk-col-blue"/>
                                <label for="{{ $catalog->name }}">{{ $catalog->name }}</label>
                            </div>
                        @endforeach
                        <label>กำลังไฟ</label><br>
                        @foreach($colors as $index=>$color)
                            <div class="col-lg-12 col-sm-12">
                                <input type="checkbox" id="{{ $color->name }}" name="colors" value="{{ $color->id }}"
                                       class="filled-in chk-col-red"/>
                                <label for="{{ $color->name }}">{{ $color->name }}</label>
                            </div>
                        @endforeach
                        <label>ขนาด</label><br>
                        @foreach($sizes as $index=>$size)
                            <div class="col-lg-12 col-sm-12">
                                <input type="checkbox" id="{{ $size->name }}" name="sizes" value="{{ $size->id }}"
                                       class="filled-in chk-col-green"/>
                                <label for="{{ $size->name }}">{{ $size->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-10 col-sm-12 mb-2">
                            <h3 class="box-title">รายการสินค้า</h3>
                        </div>
                        <div class="col-lg-2 col-sm-12" align="right">
                            <a class="btn btn-rounded text-white w-100" style="background-color: #00be00;"
                               href="{{ route('backend.products.create') }}">
                                <i class="fa fa-plus"></i> เพิ่ม
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="product-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <th>ลำดับ</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th>เพิ่มเมื่อ</th>
                        <th>แก้ไขล่าสุดเมื่อ</th>
                        <th>การจัดการ</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).on('show.bs.modal', '.modal', function (e) {
            var title = $(e.relatedTarget).data('title')
            $('#myModalLabel').html(title);
        });
    </script>
    <script>
        $(function () {
            let productTable = $('#product-table').DataTable({
                ajax: {
                    url: "/api/filter/product",
                    type: "POST",
                    data: function ( d ) {
                        d.form = $('#form-filter').serializeArray()
                    },
                    "dataSrc": function ( json ) {
                        let results = [];
                        for ( var i=0, ien=json.length ; i<ien ; i++ ) {
                            let result = [];
                            result.push(i+1);
                            if (json[i]['path'])
                                result.push('<img src="/'+json[i]['path']+'" width="100px">');
                            else
                                result.push('<img src="">');
                            result.push(json[i]['name']);
                            result.push(json[i]['created_at']);
                            result.push(json[i]['updated_at']);
                            result.push('<div class="row">\n' +
                                '                                    <div class="col-md-12 mb-2">\n' +
                                '                                        <a href="/backend/products/'+json[i]['id']+'/edit"\n' +
                                '                                            class="btn btn-warning btn-rounded w-100"><i class="fa fa-edit"></i></a>\n' +
                                '                                    </div>\n' +
                                '                                    <div class="col-md-12 mb-2">\n' +
                                '                                        <form action="/backend/products/'+json[i]['id']+'"\n' +
                                '                                            method="post">\n' +
                                '                                            @csrf\n' +
                                '                                            @method("delete")\n' +
                                '                                            <button type="submit" class="btn btn-danger btn-rounded w-100"><i\n' +
                                '                                                    class="fa fa-trash"></i></button>\n' +
                                '                                        </form>\n' +
                                '                                    </div>\n' +
                                '                                </div>');
                            results.push(result);
                        }
                        return results;
                    }
                }
            });
            $('input[type=checkbox]').change(
                function () {
                    productTable.ajax.reload();
                });
        }); // End of use strict
    </script>
@stop
