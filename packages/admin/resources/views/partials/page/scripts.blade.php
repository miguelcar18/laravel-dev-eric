<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/vendor/admin/vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/vendor/admin/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/vendor/admin/vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('/vendor/admin/js/custom/datatables/lang/'.config('app.locale').'.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/vendor/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

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

<script src="{{ asset('/vendor/admin/js/admin.js') }}"></script>

@yield('scripts')
