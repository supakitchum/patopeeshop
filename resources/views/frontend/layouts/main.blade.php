<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
    <title>{{ get_title() }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,500i,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/frontend/framework7.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/framework7-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ mix("assets/stylesheets/styles.css") }}"/>

</head>

<body>
<div id="app">
    <div class="view view-main view-init ios-edges" data-url="/">
        <div class="page page-home">
            @include('frontend.layouts.tab-menu')
            <div class="tabs page-content">
                @yield('tab-content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/frontend/framework7.js') }}"></script>
<script src="{{ asset('js/frontend/routes.js') }}"></script>
<script src="{{ asset('js/frontend/app.js') }}"></script>
<script src="{{ asset('js/frontend/axios.min.js') }}"></script>
<script>
    setInterval(function () {
        var items = sessionStorage.getItem('shoppingCart') ? JSON.parse(sessionStorage.getItem('shoppingCart')): [];
        $('#count').html(items.length);
    },1000)
</script>
</body>

</html>
