<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('modules.navbar')

    @include('modules.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('modules.footer')

</div>


<script src="/js/app.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@yield('scripts')
</body>
</html>
