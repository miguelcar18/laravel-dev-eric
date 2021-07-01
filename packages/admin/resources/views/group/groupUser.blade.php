@extends('admin::layouts.app')

@section('page-title')
    {{ trans('admin::pages/group.group_user.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('admin::pages/group.group_user.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
        ['href' => route('admin::group.index'), 'text' => trans('admin::pages/group.index.breadcrumb')],
        ['text' => trans('admin::pages/group.group_user.breadcrumb')]
    ]])
@endsection

@section('page-content')

    {!! Form::open(['route' => ['admin::group.update', $group], 'class' => 'has-max-width']) !!}
    {{ method_field('PUT') }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('groups', trans('admin::pages/group.fields.groups'), []) !!}
                                {!! Form::select('group_id', $groups,$group, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('group_id'), 'admin::partials.forms.field-error', ['field' => 'group'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card ">
            @jwt_field
            <div class="card-body ">
                <div class="row">
                    <div class="table-responsive">
                        <table id="server-side-data-table" class="table table-bordered table-hover table-striped table-light-dark">
                            <thead class="thead-default">
                            <tr>
                                <th>{{ trans('admin::pages/group.index.columns.name') }}</th>
                                <th>{{ trans('admin::pages/group.index.columns.id') }}</th>
                                <th>{{ trans('admin::pages/group.index.columns.actions') }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        const tableActionButtons = (data) => {
            var html = '';

            // if (data.can_show) {
            html+='<div class="form-check">';
            html+='<input class="form-check-input checkStatus" data-id="'+ data.id+ '" id="isChecked" type="checkbox" value="user_id" >';
            html+='</div>';

            if (html == "") {
                html+="N/A";
            }

            return html;
        }

        $(document).ready(function() {
            var table = $('#server-side-data-table').DataTable( {
                autoWidth: true,
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
                    url: "{{ route('admin::api.group.group_user') }}",
                    data: function ( d ) {
                        d.token = $('input[name=token]').val();
                        d.status = $('input[name=status]:checked').val() || 'active';
                    },
                    beforeSend: function ( jqXHR, settings ) {
                        $('.page-loader').addClass('opacity-03').fadeIn();
                        $(".preloader").removeAttr( "style" );
                        $(".preloader").children().show();

                    },
                    error: function ( jqXHR, textStatus, errorThrown ) {
                        console.log('error', jqXHR, textStatus, errorThrown);
                    },
                    complete: function ( response, textStatus  ) {
                        $('.page-loader').fadeOut().removeClass('opacity-03');
                        $(".preloader").css('height', 0);
                        $(".preloader").children().hide();
                    },
                    dataSrc: function( json ){
                        json.draw = json.meta.draw;
                        json.recordsTotal = json.meta.pagination.total;
                        json.recordsFiltered = json.meta.pagination.total;

                        return json.data;
                    }
                },
                columns: [
                    { data: 'name', name: 'name', render: function(data, type, row, meta) {
                            if(row.can_edit) {
                                return '<a href="'+row.edit_route+'" title="{{ trans('admin::pages/group.index.edit') }}">' + data + '</a>';
                            }
                            return data;
                        } },
                    {data: 'id', name: 'id',},
                    { data: null, name: 'actions', searchable: false, orderable: false, class: 'fit align-right', render: function(data) {
                            return tableActionButtons(data);
                        } }
                ],
                order: [[ 0, 'asc' ]],
                createdRow: function ( row, data, index ) {
                    $(row).find('td span.date-time').each(function(index, el) {
                        $(el).text(moment.utc($(el).text()).local().format('DD/MM/YYYY hh:mm:ss a'));
                    });
                },
                initComplete: function(settings, json) {
                    {{--
                    let array_radios = [
                        {'value': 'active', 'label': '{{ __("Active records") }}', 'active': true},
                        {'value': 'removed', 'label': '{{ __("Removed records") }}'},
                        {'value': 'all', 'label': '{{ __("All") }}'}
                    ];
                    --}}

                    {{--let create_button = {--}}
                    {{--    url: "{{ route('admin::permission.create') }}",--}}
                    {{--    title: "{{ trans('admin::pages/permission.create.page_title') }}"--}}
                    {{--};--}}

                    datatableSearch(table);
                    {{--
                    datatableFilters(create_button, array_radios);
                    --}}
                    // datatableFilters(create_button);
                }
            });

            $(document).on('change','select[name=group_id]',function (event){
                let select = $(this)
                let id = $('select[name=group_id]').val();
                if (!select.is('change')){
                    location.href = "{{ route('admin::group.group_user', 'A_FAKE_ID_TO_REPLACE') }}".replace('A_FAKE_ID_TO_REPLACE', $("select[name=group_id]").val());
                }
            })

            // $(document).on('change','input.checkStatus',function (event) {
            //     let checkbox = $(this);
            //     let isChecked = 0;
            //
            //     if (checkbox.is(':checked')) {
            //         isChecked = 1;
            //         localStorage.setItem('isChecked',isChecked);
            //     }else {
            //         localStorage.setItem('isChecked',isChecked);
            //     }
            // });
            // $(document).on('change','input.checkStatus',function (event) {
            //     let isChecked = localStorage.getItem("isChecked");
            //     document.getElementById("isChecked").innerHTML = isChecked;
            // });

            $(document).on('change','input.checkStatus',function (event) {
                let checkbox = $(this);
                let idUser = checkbox.data('id');
                let idGroup = $('select[name=group_id]').val();
                let isChecked = 0;
                if (checkbox.is(':checked')) {
                    isChecked = 1;
                }
                console.info('id de usuario: '+idUser);

                $.ajax({
                    url:'{{ route('admin::api.group.assign_user') }}',
                    type: 'post',
                    data: {
                        token: $('input[name=token]').val(),
                        group_id: idGroup,
                        user_id: idUser,
                        isChecked: isChecked
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response)
                    },
                    error: function ( jqXHR, textStatus, errorThrown ) {
                        console.log({jqXHR, textStatus, errorThrown})
                    }
                })
            });
        });


    </script>

@endsection

@section('styles')
    @parent
@endsection
