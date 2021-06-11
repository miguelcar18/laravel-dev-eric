@extends('admin::layouts.app')

@section('page-title')
    {{ trans('news::pages/author.create.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('news::pages/author.create.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
        ['href' => route('news::author.index'), 'text' => trans('news::pages/author.index.breadcrumb')],
        ['text' => trans('news::pages/author.create.breadcrumb')]
    ]])

@endsection

@section('page-content')

    {!! Form::open(['route' => ['news::author.store'], 'id' => 'create-form', 'class' => 'has-max-width']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('dni', trans('news::pages/author.fields.dni'), []) !!}
                                {!! Form::text('dni', old('dni'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('dni'), 'admin::partials.forms.field-error', ['field' => 'dni'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('email', trans('news::pages/author.fields.email'), []) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('email'), 'admin::partials.forms.field-error', ['field' => 'email'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', trans('news::pages/author.fields.name'), []) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('name'), 'admin::partials.forms.field-error', ['field' => 'name'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('lastName', trans('news::pages/author.fields.lastName'), []) !!}
                                {!! Form::text('lastName', old('lastName'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('lastName'), 'admin::partials.forms.field-error', ['field' => 'lastName'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('phone', trans('news::pages/author.fields.phone'), []) !!}
                                {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('phone'), 'admin::partials.forms.field-error', ['field' => 'phone'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row justify-content-end">
                <div class="btn-demo">
                    <a class="btn btn-secondary" href="{{ route('news::author.index') }}" title="{{ __('Cancel') }}">{{ __('Cancel') }}</a>
                    {!! Form::hidden('return_to', 'news::author.index') !!}&nbsp;&nbsp;
                </div>
                <div class="btn-demo">
                    {!! Form::submit(__("Save and create another"), [
                            'class' => 'btn btn-info float-right',
                            'name' => 'create_another',
                            'title' => __("Save and create another")
                            ]) !!}
                </div> &nbsp;&nbsp;
                <div class="btn-demo">
                    {!! Form::submit(trans('news::pages/author.fields.submit.save'), [
                        'class' => 'btn btn-info float-right',
                        'name' => 'save',
                        'title' => trans('news::pages/author.fields.submit.save')
                        ]) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function (){

        })
    </script>
@endsection

@section('styles')
    @parent
@endsection
