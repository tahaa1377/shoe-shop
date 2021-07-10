<!doctype html>
<html lang="en">
<head>
    <title >فروشگاه کفش گنج</title>
    <link rel ="icon" href ="images/a3.jpg" type = "image/x-icon">
    <link rel ="shortcut icon" href ="images/a3.jpg" type = "image/x-icon">
    {{--<link rel = "icon" href ="h-id.ir/images/a3.jpg" type = "image/x-icon">--}}
    <meta name="Keywords" content="فروشگاه,فروشگاه کفش ,کفش">
    <meta name="description" content="فروشگاه کفش گنجی با بیش از ۱۰ سال سابقه در صنعت کفش ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link href="/css/font-awesome.min.css" rel="stylesheet">--}}
    <link href="/less/design.min.css?mn" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css?m">
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >--}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    {{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>--}}
    @yield("js")
    @yield('css')
</head>
<body>
<div style="text-align: center" >

    {{--{{print_r($_SESSION)}}--}}
    @yield("section")
    @include("footer")
</div>
</body>
</html>