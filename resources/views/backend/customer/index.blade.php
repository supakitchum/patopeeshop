@extends('backend.layouts.main')
@section('title','สมาชิก')
@section('page_name','สมาชิก')
@section('sub_page_name','')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายชื่อสมาชิก</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="customer-table" class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทร.</th>
                            <th>ที่อยู่</th>
                            <th>สมัครเมื่อ</th>
                            <th>การจัดการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $index=>$customer)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $customer->fname.' '.$customer->lname }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>
                                    {{ $customer->address }}<br>ตำบล {{ $customer->district ? $customer->district:'-' }}<br>จังหวัด {{ $customer->province ? $customer->province:'-' }}<br>{{ $customer->zip_code ? $customer->zip_code:'-' }}
                                </td>
                                <td>{{ $customer->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <a href="{{ route('backend.customers.edit',['id' => $customer->id]) }}"
                                               class="btn btn-info btn-rounded w-100"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <form action="{{ route('backend.customers.destroy',['id' => $customer->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-rounded w-100"><i
                                                        class="fa fa-trash"></i></button>
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
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#customer-table').dataTable();
        })
    </script>
@endsection
