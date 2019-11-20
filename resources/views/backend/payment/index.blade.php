@extends('backend.layouts.main')
@section('title','รายการแจ้งชำระ')
@section('page_name','รายการแจ้งชำระ')
@section('sub_page_name','')
@section('content')

<!-- Main content -->
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="box-title">รายการแจ้งชำระ</h3>
                    </div>

                    <div class="col-lg-6 col-sm-12" align="right">
                        <a class="btn btn-rounded text-white" style="background-color: #00be00;"
                            href="{{ route('backend.payments.create') }}">
                            <i class="fa fa-plus"></i> เพิ่ม
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Medium model <code>Click on image</code></h3>
                    </div>
                    <div class="box-body">
                        <!-- sample modal content -->
                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Medium model</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Overflowing text to show scroll behavior</h4>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna,
                                            vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper
                                            nulla non metus auctor fringilla.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info waves-effect"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <img src="../../../images/model.png" alt="default" data-toggle="modal" data-target="#myModal"
                            class="model_img img-fluid" />
                    </div>
                </div>
            </div><!-- /.col -->
            <!-- /.box-header -->
            <i class="fa fa-2x fa-clos" style="color: green;"></i>
            <!-- Modal -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img id="img-zoom-modal" src="sdfsdfsdf" alt="" class="img-fluid" width="550px">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="box-body">
                <table id="payment-table" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <th>ลำดับ</th>
                        <th>จำนวนเงิน</th>
                        <th>หลักฐาน</th>
                        <th>วันที่แจ้งชำระ</th>
                        <th>ธนาคารที่ชำระ</th>
                        <th>Order No.</th>
                        <th>ทำรายการเมื่อ</th>
                        <th>การจัดการ</th>
                    </thead>

                    <tbody>
                        @foreach($results as $index=>$result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $result->amount }}</td>
                            <td><img data-toggle="modal" data-target="#myModal" class="model_img img-fluid"
                                    src="{{ isset($result->slip)?($result->slip):'' }}" height="100" width="100"
                                    data-src="{{ isset($result->slip)?($result->slip):'' }}"></td>
                            <td>{{ $result->transfer_at }}</td>
                            <td>{{ $result->bank }}</td>
                            <td>{{ $result->order_id }}</td>
                            <td>{{ $result->created_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <a href="{{ route('backend.payments.edit',["id" => $result->id]) }}"
                                            class="btn btn-primary btn-rounded w-100"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <form action="{{ route('backend.payments.destroy',["id" => $result->id]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-danger btn-rounded w-100">
                                                <i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


@stop
@section('script')
<script>
$(function() {
    $('#payment-table').DataTable({
        "columnDefs": [{
                "width": "5%",
                "targets": 0
            },
            {
                "width": "10%",
                "targets": 1
            },
            {
                "width": "15%",
                "targets": 2
            },
            {
                "width": "15%",
                "targets": 3
            },
            {
                "width": "10%",
                "targets": 4
            },
            {
                "width": "15%",
                "targets": 5
            },
            {
                "width": "20%",
                "targets": 6
            },
            {
                "width": "20%",
                "targets": 7
            }
        ]
    });

}); // End of use strict
</script>
<script>
$(document).on('show.bs.modal', '.modal', function(e) {
    var img = $(e.relatedTarget).data('src');
    alert(img);
    $(".modal-body #img-zoom-modal").attr('src', img);
});
</script>
@stop