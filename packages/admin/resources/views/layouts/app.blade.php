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
