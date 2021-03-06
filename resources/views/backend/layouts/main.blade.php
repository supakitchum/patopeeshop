<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ get_title() }}</title>
    <!-- Bootstrap v4.0.0-beta -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">

    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('css/master_style.css') }}">

    <!-- mínimo_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}">

    <!-- morris chart -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/morris.js/morris.css') }}">

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/jvectormap/jquery-jvectormap.css') }}">

    <!-- date picker -->
    <link rel="stylesheet"
          href="{{ asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css') }}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('backend.layouts.header')

    @include('backend.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_name')
                <small>@yield('sub_page_name')</small>
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                <?php $segments = ''; ?>
                @foreach(Request::segments() as $segment)
                    @if($segment != 'backend')
                        <?php
                        $segments .= '/'.$segment;
                        ?>
                        <li class="breadcrumb-item active"><a href="{{ "/backend".$segments }}">{{$segment}}</a></li>
                    @endif
                @endforeach
            </ol>
        </section>

        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- /.content-wrapper -->
    @include('backend.layouts.footer')

</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="{{ asset('assets/vendor_components/jquery/dist/jquery.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/vendor_components/jquery-ui/jquery-ui.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- popper -->
<script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>
<!-- Bootstrap v4.0.0-beta -->
<script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/vendor_components/chart-js/chart.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('assets/vendor_components/raphael/raphael.js') }}"></script>
<script src="{{ asset('assets/vendor_components/morris.js/morris.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

<!-- jvectormap -->
<script src="{{ asset('assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/vendor_components/jquery-knob/js/jquery.knob.js') }}"></script>

<!-- daterangepicker -->
<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>

<!-- mínimo_admin App -->
<script src="{{ asset('js/template.js') }}"></script>

<!-- mínimo_admin dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('js/pages/dashboard.js') }}"></script>

<!-- mínimo_admin for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js') }}"></script>
@yield('script')
</body>
</html>
