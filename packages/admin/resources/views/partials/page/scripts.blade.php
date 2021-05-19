<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/vendor/admin/vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/vendor/admin/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/vendor/admin/vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/vendor/admin/vendor/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('/vendor/admin/vendor/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('/vendor/admin/vendor/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/vendor/admin/vendor/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/vendor/admin/vendor/dist/js/pages/dashboard2.js') }}"></script>

@yield('scripts')
