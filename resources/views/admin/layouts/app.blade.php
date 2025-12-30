<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>نظام الشكاوي | لوحة المعلومات</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">

  <!-- RTL override (LAST) -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/rtl.min.css')}}">
</head>

<body class="hold-transition LIGHT-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  @include('admin.layouts.nav-top')

  @include('admin.layouts.side-nav')

  <div class="content-wrapper">
    @yield('content')
  </div>

  <aside class="control-sidebar control-sidebar-light"></aside>
</div>

<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<script src="{{asset('admin/dist/js/pages/dashboard2.js')}}"></script>
</body>
</html>
