<html>

<head lang="th" dir="ltr">
    <title>PatooPhee</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }

        table {
            border-collapse: collapse;
        }

        table,
        tr,
        th,
        td {
            text-align: center;
        }
    </style>

</head>

<body>
@if(auth()->guard('admin')->check())
    <div style="height:40%">
        <table width=" 100%" style="width:100%" border="0">
            <thead>
            <tr>
                <th width="50%" style="text-align: left">
                    <p style="font-size:25px;margin: 0 0 0 20" valign=" top">
                        ถึง (ผู้รับ)
                    </p>
                </th>
                <th width="50%" style="text-align: left">
                    <p style="font-size:25px;margin: 0 0 0 20" valign="top">
                        จาก (ผู้ส่ง)</p>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: left">
                    <p style="margin-left: 20px;font-size:20px">
                        <b>ชื่อ</b> {{ $order->fname.' '.$order->lname }}<br>
                        <b>ที่อยู่</b> {{ $order->address }}<br>
                        ต.{{ $address->district }} อ.{{ $address->amphoe }}
                        จ.{{ $address->province }} {{ $order->zip_code }}<br>
                        <b>เบอร์โทร.</b> {{ $order->phone }}<br>
                    </p>
                </td>
                <td style="text-align: left">
                    <p style="margin-left: 20px;font-size:20px">
                        <b>ชื่อ</b> บริษัท ประตูผี จำกัด (สำนักงานใหญ่)<br>
                        <b>ที่อยู่</b> 733 หมู่ 8 ตำบลเวียงใต้<br>
                        อ.ปาย จ.แม่ฮ่องสอน 58130<br>
                        <b>เบอร์โทร.</b> 081-1690901<br>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
<div align="center">
    @if(auth()->guard('admin')->check())
        <hr>
    @endif
    <h1> ประตูผี </h1>
    <h2>รายการสินค้า</h2>
</div>
<table width="100%" style="width:100%" border="1">
    <thead>
    <tr>
        <th style="font-size:20px">ชื่อสินค้า</th>
        <th style="font-size:20px">คุณลักษณะ</th>
        <th style="font-size:20px">ราคาต่อชิ้น</th>
        <th style="font-size:20px">จำนวน</th>
        <th style="font-size:20px">ราคารวม</th>
    </tr>
    </thead>
    <tbody>
    @foreach($details as $detail)
        <tr>
            <td>{{ $detail->product_name  }}</td>
            <td>
                กำลังไฟ : {{ $detail->color }} <br>
                ขนาด : {{ $detail->size }}
            </td>
            <td>{{ number_format( $detail->price,2) }}</td>
            <td>{{ $detail->amount }}</td>
            <td>{{ number_format( $detail->price * $detail->amount,2) }}</td>
        </tr>
    @endforeach
    <tr>
        <td style="text-align: left" colspan="4">
            <p style="margin: 0 0 0 20;font-size:20px"><b>ยอดชำระรวม</b>
        </td>
        <td>{{ number_format($order->total,2) }} บาท</td>
    </tr>
    </tbody>
</table>

</body>

</html>
