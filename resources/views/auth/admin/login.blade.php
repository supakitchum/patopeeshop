<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../images/favicon.ico">

    <title>mínimo admin - Log in </title>

    <!-- Bootstrap v4.0.0-beta -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/master_style.css') }}">

    <!-- mínimo_admin Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <h1>Logo</h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post" class="form-element">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="ion ion-email form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="ion ion-locked form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="checkbox">
                        <input type="checkbox" id="basic_checkbox_1">
                        <label for="basic_checkbox_1">Remember Me</label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="fog-pwd">
                        <a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                    </div>
                </div>
                <div class="col-12" style="margin-left: 2%;">
                    @if(env('GOOGLE_RECAPTCHA_KEY'))
                        <script src="https://www.google.com/recaptcha/api.js?hl=th"></script>
                        <div class="g-recaptcha w-100"
                             data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                        </div>
                    @endif
                </div>
                <!-- /.col -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info btn-block btn-flat margin-top-10">SIGN IN</button>
                </div>
            <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="{{ asset('assets/vendor_components/jquery/dist/jquery.min.js') }}"></script>

<!-- popper -->
<script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>

<!-- Bootstrap v4.0.0-beta -->
<script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>
