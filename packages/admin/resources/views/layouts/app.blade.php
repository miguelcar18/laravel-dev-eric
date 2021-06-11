@extends('admin::layouts.master')

@section('screen')
    <div class="wrapper">

        @include("admin::partials.page.preloader")
        @include('admin::partials.page.header')
        @include('admin::partials.page.left-bar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!-- container-fluid -->
                @yield('breadcrumbs')

                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>@yield('page-header')</h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('page-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection

@section('scripts')
<script type="text/javascript">

    setInterval(refreshJWToken, 3000000);
    function refreshJWToken(){
        $.post('{{ route('admin::api.auth.token.refresh') }}', {
            token: $('input[name=token]').val()
        }, (response, status, xhr) => {
            $('input[name=token]').val(response.data.access_token);
        }, 'json')
        .fail( (xhr, status, response) => {
            location.reload();
        } );
    }

    setInterval(refreshCsrfToken, 3000000);
    function refreshCsrfToken(){
        $.get('{{ route('admin::refresh-csrf') }}', {}, (response, status, xhr) => {
            $('input[name=_token]').val(response.token);
        }, 'json')
        .fail( (xhr, status, response) => {
            location.reload();
        } );
    }

</script>
@endsection
