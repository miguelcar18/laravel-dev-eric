@extends('admin::layouts.app')

@section('page-title')
    {{ trans('admin::pages/customer.create.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
- {{ trans('admin::pages/customer.create.page_header') }}
@endsection

@include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['href' => route('admin::customer.index'), 'text' => trans('admin::pages/customer.index.breadcrumb')],
    ['text' => trans('admin::pages/customer.create.breadcrumb')]
]])

@section('page-content')

    {!! Form::open(['route' => ['admin::customer.store'], 'id' => 'create-form', 'class' => 'has-max-width']) !!}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name', trans('admin::pages/customer.fields.name'), []) !!}
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true]) !!}
                                    @includeWhen($errors->has('name'), 'admin::partials.forms.field-error', ['field' => 'name'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('email', trans('admin::pages/customer.fields.email'), []) !!}
                                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'required' => true]) !!}
                                    @includeWhen($errors->has('email'), 'admin::partials.forms.field-error', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('mobile', trans('admin::pages/customer.fields.mobile'), []) !!}
                                    {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'required' => true]) !!}
                                    @includeWhen($errors->has('mobile'), 'admin::partials.forms.field-error', ['field' => 'mobile'])
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
                        {!! Form::submit(trans('admin::pages/customer.fields.submit.save'), [
                            'class' => 'btn btn-info float-right',
                            'name' => 'save',
                            'title' => trans('admin::pages/customer.fields.submit.save')
                            ]) !!}
                        <a class="btn btn-secondary" href="{{ route('admin::customer.index') }}" title="{{ __('Cancel') }}">{{ __('Cancel') }}</a>
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

        });
    </script>
@endsection

@section('styles')
    @parent
@endsection
