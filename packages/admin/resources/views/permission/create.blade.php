@extends('admin::layouts.app')

@section('page-title')
    {{ trans('admin::pages/permission.create.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('admin::pages/permission.create.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
        ['href' => route('admin::permission.index'), 'text' => trans('admin::pages/permission.index.breadcrumb')],
        ['text' => trans('admin::pages/permission.create.breadcrumb')]
    ]])
@endsection

@section('page-content')

    {!! Form::open(['route' => ['admin::permission.store'], 'id' => 'create-form', 'class' => 'has-max-width']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', trans('admin::pages/permission.fields.name'), []) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('name'), 'admin::partials.forms.field-error', ['field' => 'name'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('slug', trans('admin::pages/permission.fields.slug'), []) !!}
                                {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('slug'), 'admin::partials.forms.field-error', ['field' => 'slug'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', trans('admin::pages/permission.fields.description'), []) !!}
                                {!! Form::text('description', old('description'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('description'), 'admin::partials.forms.field-error', ['field' => 'description'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row justify-content-end">
                <div class="col-12 btn-demo">
                    {!! Form::submit(__("Save and create another"), [
                        'class' => 'btn btn-info float-right',
                        'name' => 'create_another',
                        'title' => __("Save and create another")
                        ]) !!}
                    {!! Form::submit(trans('admin::pages/permission.fields.submit.save'), [
                        'class' => 'btn btn-info float-right',
                        'name' => 'save',
                        'title' => trans('admin::pages/permission.fields.submit.save')
                        ]) !!}
                    <a class="btn btn-secondary" href="{{ route('admin::permission.index') }}"
                       title="{{ __('Cancel') }}">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("keyup", "input[name=name]", function(e){
                if ( $("input[name=slug]").length ) {
                    $("input[name=slug]").val(slugify($(this).val()));
                }
            });
        });
    </script>
@endsection

@section('styles')
    @parent
@endsection
