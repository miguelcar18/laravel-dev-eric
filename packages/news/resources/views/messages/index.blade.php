@extends('admin::layouts.app')

@section('page-title')
    {{ trans('news::pages/message.index.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    {{ trans('news::pages/message.index.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['text' => trans('news::pages/message.index.breadcrumb')]
]])
@endsection

@section('page-content')
    <div class="card">
        @jwt_field
        <div class="card-body">
            <div class="row">

                <div class="table-responsive">
                    <table id="server-side-data-table"
                           class="table table-bordered table-hover table-striped table-light-dark">
                        <thead class="thead-default">
                        <tr>
                            <th>{{ trans('news::pages/message.index.columns.name') }}</th>
                            <th>{{ trans('news::pages/message.index.columns.subject') }}</th>
                            <th>{{ trans('news::pages/message.index.columns.sender_email') }}</th>
                            <th>{{ trans('news::pages/message.index.columns.answer_to') }}</th>
                            <th>{{ trans('news::pages/message.index.columns.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        const tableActionButtons = (data) => {
            var html = '';

            // if (data.can_edit) {
                html += '<button onclick="location.href=\'' + data.edit_route + '\'"';
                html += 'class="btn btn-outline-warning btn--icon "';
                html += 'title="{{ trans('news::pages/message.index.edit') }}"';
                html += '><i class="fa fa-edit"></i></button> &nbsp;';
            // }

            // if (data.can_show) {
                html += '<button onclick="location.href=\'' + data.show_route + '\'"';
                html += 'class="btn btn-outline-info btn--icon"';
                html += 'title="{{ trans('news::pages/message.index.show') }}"';
                html += '><i class="fa fa-eye"></i></button> &nbsp;';
            // }

            // if (data.can_delete) {
                html += '<button class="btn btn-outline-danger btn--icon"';
                html += 'title="{{ trans('news::pages/message.index.destroy.tooltip') }}"';
                html += 'data-trigger="sweet-alert"';
                html += 'data-sweet-alert-title="{{ trans('news::pages/message.index.destroy.alert.title') }}"';
                html += 'data-sweet-alert-text="{{ trans('news::pages/message.index.destroy.alert.text') }}"';
                html += 'data-sweet-alert-type="error"';
                html += 'data-sweet-alert-confirm-text="{{ trans('news::pages/message.index.destroy.alert.confirm') }}"';
                html += 'data-sweet-alert-confirm-action="document.getElementById(\'delete-' + data.id + '\').submit()"';
                html += 'data-sweet-alert-cancel-text="{{ trans('news::pages/message.index.destroy.alert.cancel') }}"';
                html += '><i class="fa fa-trash-alt"></i></button>';
                html += '<form action="' + data.delete_route + '" id="delete-' + data.id + '" style="display: none;" method="POST">{{ method_field('DELETE') }}{{ csrf_field() }}</form>';
            // }

            if (html == "") {
                html += "N/A";
            }

            return html;
        }

        $(document).ready(function () {
            var table = $('#server-side-data-table').DataTable({
                autoWidth: false,
                orderMulti: true,
                processing: false,
                responsive: true,
                searchDelay: 1000,
                select: false,
                serverSide: true,
                pageLength: 50,
                language: datatables_language.translations,
                lengthMenu: datatables_language.length_menu,
                dom: datatables_language.dom,
                ajax: {
                    url: "{{ route('news::api.message.index') }}",
                    data: function (d) {
                        d.token = $('input[name=token]').val();
                        d.status = $('input[name=status]:checked').val() || 'active';
                    },
                    beforeSend: function (jqXHR, settings) {
                        $('.page-loader').addClass('opacity-03').fadeIn();
                        $(".preloader").removeAttr("style");
                        $(".preloader").children().show();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('error', jqXHR, textStatus, errorThrown);
                    },
                    complete: function (response, textStatus) {
                        $('.page-loader').fadeOut().removeClass('opacity-03');
                        $(".preloader").css('height', 0);
                        $(".preloader").children().hide();
                    },
                    dataSrc: function (json) {
                        json.draw = json.meta.draw;
                        json.recordsTotal = json.meta.pagination.total;
                        json.recordsFiltered = json.meta.pagination.total;

                        return json.data;
                    }
                },
                columns: [
                    {
                        data: 'name', name: 'name', render: function (data, type, row, meta) {
                            if (row.can_edit) {
                                return '<a href="' + row.edit_route + '" title="{{ trans('news::pages/message.index.edit') }}">' + data + '</a>';
                            }
                            return data;
                        }
                    },
                    {data: 'subject', name: 'subject'},
                    {data: 'sender_email', name: 'sender_email'},
                    {data: 'answer_to', name: 'answer_to'},
                    {
                        data: null,
                        name: 'actions',
                        searchable: false,
                        orderable: false,
                        class: 'fit align-right',
                        render: function (data) {
                            return tableActionButtons(data);
                        }
                    }
                ],
                order: [[0, 'asc']],
                createdRow: function (row, data, index) {
                    $(row).find('td span.date-time').each(function (index, el) {
                        $(el).text(moment.utc($(el).text()).local().format('DD/MM/YYYY hh:mm:ss a'));
                    });
                },
                initComplete: function (settings, json) {
                    {{--
                    let array_radios = [
                        {'value': 'active', 'label': '{{ __("Active records") }}', 'active': true},
                        {'value': 'removed', 'label': '{{ __("Removed records") }}'},
                        {'value': 'all', 'label': '{{ __("All") }}'}
                    ];
                    --}}

                    let create_button = {
                        url: "{{ route('news::message.create') }}",
                        title: "{{ trans('news::pages/message.create.page_title') }}"
                    };

                    datatableSearch(table);
                    {{--
                    datatableFilters(create_button, array_radios);
                    --}}
                    datatableFilters(create_button);
                }
            });
        });
    </script>
@endsection

@section('styles')
    @parent
@endsection
