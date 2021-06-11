<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') | {{ config('app.name', 'Practica paquetes') }}</title>

    <!-- Fonts -->
    @include('admin::partials.page.fonts')
    <!-- Styles -->
    @include('admin::partials.page.styles')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    @yield('screen')
    <!-- Scripts -->
    @include('admin::partials.page.scripts')

</body>
</html>
