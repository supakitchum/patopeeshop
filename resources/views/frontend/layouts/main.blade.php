<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>{{ get_title() }}</title>
    @include('frontend.layouts.css')
</head>
<body class="home">
@include('frontend.layouts.navbar')
@yield('content')
@include('frontend.layouts.footer')
<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
@include('frontend.layouts.js')
@yield('script')
</body>
</html>
