@extends('backend.layouts.main')
@section('title','จัดการสินค้า')
@section('page_name','จัดการ0สินค้า')
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
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
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
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายการสินค้า</h3>
                        </div>
                        <div class="col-lg-6 col-sm-12" align="right">
                            <a class="btn btn-rounded text-white" style="background-color: #00be00;" href="{{ route('backend.products.create') }}">
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
                        @foreach($results as $index=>$result)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td><img src="{{ isset($images->images($result->id)[0]->path) ? asset($images->images($result->id)[0]->path):'' }}" width="100px"></td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->created_at }}</td>
                                <td>{{ $result->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <a data-toggle="modal" data-title="{{ $result->name }}" data-target="#myModal" class="btn btn-info btn-rounded w-100"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <a href="{{ route('backend.products.edit',['id' => $result->id]) }}" class="btn btn-warning btn-rounded w-100"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <form action="{{ route('backend.products.destroy',['id' => $result->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-rounded w-100"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
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
        $(document).on('show.bs.modal', '.modal', function (e) {
            var title = $(e.relatedTarget).data('title')
            $('#myModalLabel').html(title);
        });
    </script>
    <script>
        $(function () {
            $('#product-table').DataTable();

        }); // End of use strict
    </script>
@stop
