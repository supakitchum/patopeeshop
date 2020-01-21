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
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
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

    <link rel="stylesheet" href="{{ mix("assets/stylesheets/styles.css") }}"/>
    <style>
        .dm-uploader {
            border: 0.25rem dashed #A5A5C7;
            text-align: center;
        }

        .dm-uploader.active {
            border-color: red;

            border-style: solid;
        }

        #files {
            overflow-y: scroll !important;
            min-height: 320px;
        }

        @media (min-width: 768px) {
            #files {
                min-height: 0;
            }
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

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
                <li class="breadcrumb-item"><a href="/backend/dashboard"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                @if(!Request::is('backend/dashboard'))
                    <?php $segments = ''; ?>
                    @foreach(Request::segments() as $segment)
                        @if($segment != 'backend')
                            <?php
                            $segments .= '/' . $segment;
                            ?>
                            <li class="breadcrumb-item active"><a href="{{ "/backend".$segments }}">{{ __('menu.'.$segment)}}</a></li>
                        @endif
                    @endforeach
                @endif
            </ol>
        </section>

        <section class="content">
            <div class="row">
                @if (session('status'))
                    <div class="col-lg-12">
                        <div class="alert alert-{{ session('status')["class"]}} text-center alert-dismissible"
                             role="alert">
                            <?php
                            switch (session('status')["class"]) {
                                case "success":
                                    echo '<i class="icon fa fa-check"></i>';
                                    break;
                                case "danger":
                                    echo '<i class="icon fa fa-ban"></i>';
                                    break;
                                case "warning":
                                    echo '<i class="icon fa fa-warning"></i>';
                                    break;
                            }
                            ?>
                            {{ session('status')["message"]}}
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
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
<script src="{{ mix("assets/scripts/frontend.js") }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
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

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/vendor_components/select2/dist/css/select2.min.css') }}">
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

@if(Request::is('backend/*'))
    <!-- mínimo_admin dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>
@endif

<!-- mínimo_admin for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js') }}"></script>
@yield('script')
@if (session('alert'))
    <script>
        Swal.fire(
            "{{ session('alert')['messages']['title'] }}",
            "{{ session('alert')['messages']['body'] }}",
            "{{ session('alert')['status'] }}"
        );
        @if(session('alert')['status'] == "success")
        shoppingCart.clearCart();
        displayCart();
        @endif
    </script>
@endif
</body>

</html>
