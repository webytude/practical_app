<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <title>AdminLTE</title>
    @include('admin.layouts.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.top_header')
        <div class="content-wrapper">
            @yield('main_contant')
        </div>
        @include('admin.layouts.scripts')
        @yield('custom_scripts')
    </div>
</body>

</html>
