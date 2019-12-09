<html>

<head lang="th" dir="ltr">
    <title>PatooPhee</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    </style>

</head>

<body>
    <center>
        <h1> PatooPhee </h1>
    </center>


    <table width="100%" style="width:100%" class="table table-bordered">
        <thead>
            <tr>
                <th>ชื่อสินค้า</th>
                <th>คุณลักษณะ</th>
                <th>ราคาต่อชิ้น</th>
                <th>จำนวน</th>
                <th>ราคารวม</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{ $detail->product_name  }}</td>
                <td>
                    <p>สี : {{ $detail->color }}</p>
                    <p>ขนาด : {{ $detail->size }}</p>
                </td>
                <td>{{ number_format( $detail->price,2) }}</td>
                <td>{{ $detail->amount }}</td>
                <td>{{ number_format( $detail->price * $detail->amount,2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5">ยอดชำระรวม</td>
                <td>{{ number_format($order->total,2) }} บาท</td>
            </tr>
        </tbody>
    </table>
    </table>

</body>

</html>