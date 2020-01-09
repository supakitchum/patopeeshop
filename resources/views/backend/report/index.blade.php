@extends('backend.layouts.main')
@section('title','แจ้งปัญหา')
@section('page_name','แจ้งปัญหา')
@section('sub_page_name','')
@section('content')
    <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('backend.reports.store') }}" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="rid" id="rid" value="">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">ตอบกลับอีเมล : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">หัวข้อ : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 col-form-label">รายละเอียด : </label>
                            <!-- tools box -->
                            <div class="col-sm-10">
                                <div class="box-body pad">
                            <textarea name="detail" class="form-control textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" align="right">
                        <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success waves-effect">ส่ง</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายการปัญหา</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="report-table" class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>หัวข้อปัญหา</th>
                            <th>ผู้แจ้ง</th>
                            <th>รหัสคำสั่งซื้อ</th>
                            <th>รายละเอียด</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td>{{ $result->title }}</td>
                                <td>
                                    <p>อีเมล : {{ $result->email }}</p>
                                    <p>เบอร์โทร. : {{ $result->phone }}</p>
                                </td>
                                <td>
                                    @if(isset($result->order_ref) && $result->order_ref != "-")
                                        <a class="text-primary"
                                           href="{{route('backend.orders.show',['id' => $result->id]) }}">{{ $result->order_ref }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $result->detail }}</td>
                                <td>
                                    @if($result->status == 0)
                                        <button data-toggle="modal" data-rid="{{ $result->rid }}" data-target="#myModal"
                                                data-title="{{ $result->title }} {{ $result->order_ref ? "คำสั่งซื้อ #".$result->order_ref:"" }}"
                                                data-email="{{ $result->email }}"
                                                class="btn btn-success w-100 btn-rounded"><i class="fa fa-envelope"></i>
                                        </button>
                                    @else
                                        <button disabled class="btn btn-default w-100 btn-rounded"><i class="fa fa-check-circle"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('show.bs.modal', '.modal', function (e) {
            var email = $(e.relatedTarget).data('email');
            var rid = $(e.relatedTarget).data('rid');
            var title = $(e.relatedTarget).data('title');
            $('#email').val(email);
            $('#modal-title').html(`ตอบกลับปัญหา : ${title}`);
            $('#title').val(`ตอบกลับปัญหา : ${title}`);
            $('#rid').val(rid);
        });
        $(document).ready(function () {
            $('#report-table').dataTable({});
        })
    </script>
@endsection
