@extends('backend.layouts.main')
@section('title','คลังสินค้า')
@section('page_name','คลังสินค้า')
@section('sub_page_name','')
@section('content')
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
                <form id="form-filter">
                    <div class="box-body">
                        <label>หมวดหมู่สินค้า</label>
                        @foreach($catalogs as $index=>$catalog)
                            <div class="col-lg-12 col-sm-12">
                                <input type="checkbox" id="{{ $catalog->name }}" name="catalogs"
                                       value="{{ $catalog->name }}"
                                       class="filled-in chk-col-blue"/>
                                <label for="{{ $catalog->name }}">{{ $catalog->name }}</label>
                            </div>
                        @endforeach
                        <label>สี</label><br>
                        @foreach($colors as $index=>$color)
                            <div class="col-lg-12 col-sm-12">
                                <input type="checkbox" id="{{ $color->name }}" name="colors" value="{{ $color->name }}"
                                       class="filled-in chk-col-red"/>
                                <label for="{{ $color->name }}">{{ $color->name }}</label>
                            </div>
                        @endforeach
                        <label>ขนาด</label><br>
                        @foreach($sizes as $index=>$size)
                            <div class="col-lg-12 col-sm-12">
                                <input type="checkbox" id="{{ $size->name }}" name="sizes" value="{{ $size->name }}"
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
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายการสินค้า</h3>
                        </div>
                        <div class="col-lg-6 col-sm-12" align="right">
                            <a class="btn btn-rounded text-white" style="background-color: #00be00;"
                               href="{{ route('backend.products.create') }}">
                                <i class="fa fa-plus"></i> เพิ่ม
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="stock-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <th>หมวดหมู่</th>
                            <th>ขนาด</th>
                            <th>สี</th>
                            <th>จำนวนคงเหลือ</th>
                            <th>ราคา</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $stock->name }}</td>
                                <td>{{ $stock->catalog }}</td>
                                <td>{{ $stock->size }}</td>
                                <td>{{ $stock->color }}</td>
                                <td>{{ $stock->quality }}</td>
                                <td>{{ $stock->price }}</td>
                                <td>
                                    <a href="{{ route('backend.products.edit',['id' => $stock->id]) }}" class="btn btn-success btn-rounded w-100">
                                        <i class="fa fa-edit"></i>
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
@stop
@section('script')
    <script>
        $(function () {
            // $('#stock-table thead tr').clone(false).appendTo('#stock-table thead');
            $('#stock-table thead tr:eq(0) th').each( function (i) {
                $('input[type=checkbox]').change(
                    function () {
                        console.log('check');
                        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
                        let data = $('#form-filter').serializeArray();
                        if (data.length > 0){
                            data.forEach((data) => {
                                if (data.name === "catalogs") {
                                    if ( stockTable.column(1).search() !== data.value ) {
                                        stockTable
                                            .column(1)
                                            .search(data.value)
                                            .draw();
                                    }
                                }
                                else{
                                    stockTable
                                        .column(i)
                                        .search('')
                                        .draw();
                                }
                                if (data.name === "sizes") {
                                    if ( stockTable.column(2).search() !== data.value ) {
                                        stockTable
                                            .column(2)
                                            .search('^' + data.value + '*$',true,false)
                                            .draw();
                                    }
                                }
                                else{
                                    stockTable
                                        .column(i)
                                        .search('')
                                        .draw();
                                }
                                if (data.name === "colors") {
                                    if ( stockTable.column(3).search() !== data.value ) {
                                        stockTable
                                            .column(3)
                                            .search(data.value)
                                            .draw();
                                    }
                                }
                                else{
                                    stockTable
                                        .column(i)
                                        .search('')
                                        .draw();
                                }
                            })
                        } else{
                            stockTable
                                .column(i)
                                .search('')
                                .draw();
                        }
                    });
                $( 'input', this ).on( 'keyup change', function () {
                    if ( stockTable.column(i).search() !== this.value ) {
                        stockTable
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
            let stockTable = $('#stock-table').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            })
        });
    </script>
@endsection
