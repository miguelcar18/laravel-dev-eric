@extends('admin::layouts.app')

@section('page-title')
    {{ trans('admin::pages/group.edit.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('admin::pages/group.edit.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
        ['href' => route('admin::group.index'), 'text' => trans('admin::pages/group.index.breadcrumb')],
        ['text' => trans('admin::pages/group.create.breadcrumb')]
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
                                {!! Form::label('name', trans('admin::pages/group.fields.name'), []) !!}
                                {!! Form::text('name', old('name') ?? $group->name, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('name'), 'admin::partials.forms.field-error', ['field' => 'name'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('slug', trans('admin::pages/group.fields.slug'), []) !!}
                                {!! Form::text('slug', old('slug') ?? $group->slug, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('slug'), 'admin::partials.forms.field-error', ['field' => 'slug'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', trans('admin::pages/group.fields.description'), []) !!}
                                {!! Form::text('description', old('description') ?? $group->description, ['class' => 'form-control', 'required' => true]) !!}
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
                    {!! Form::submit(trans('admin::pages/group.fields.submit.save'), [
                        'class' => 'btn btn-info float-right',
                        'name' => 'save',
                        'title' => trans('admin::pages/group.fields.submit.save')
                        ]) !!}
                    <a class="btn btn-secondary" href="{{ route('admin::group.index') }}"
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
