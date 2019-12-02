<hr>
<p>หัวข้อ : {{ $report->title }}</p>
{!! $report->order_ref ?  '<p>รหัสอ้างอิงคำสั่งซื้อ : '.$report->order_ref.'</p>':'' !!}
<p>รายละเอียดปัญหา : {{ $report->datail }}</p>
<p>แจ้งปัญหาเมื่อ : {{ $report->created_at }}</p>
<hr><br>
<p>สวัสดีคุณ {{ $report->email }}</p>
{!! $data['detail'] !!}

<hr>
<p>{{ env('APP_NAME') }} : {{ env('APP_URL') }}</p>
