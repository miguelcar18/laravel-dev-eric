@extends('administration-ui::layouts.app')

@section('page-title')
    {{ trans('system::pages/quote_test.calculate.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('system::pages/quote_test.calculate.page_header') }}
@endsection

@include('administration-ui::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['text' => trans('system::pages/quote_test.calculate.breadcrumb')]
]])

@section('page-content')

    {!! Form::open(['route' => ['system::quote-result'], 'class' => 'has-max-width']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('origin_county_code', trans('system::pages/quote_test.fields.origin_county_code'), []) !!}
                                {!! Form::select('origin_county_code', $counties,  old('origin_county_code'), ['class' => 'form-control select2', 'required' => true]) !!}
                                @includeWhen($errors->has('origin_county_code'), 'administration-ui::partials.forms.field-error', ['field' => 'origin_county_code'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('destination_county_code', trans('system::pages/quote_test.fields.destination_county_code'), []) !!}
                                {!! Form::select('destination_county_code', $counties,  old('destination_county_code'), ['class' => 'form-control select2', 'required' => true]) !!}
                                @includeWhen($errors->has('destination_county_code'), 'administration-ui::partials.forms.field-error', ['field' => 'destination_county_code'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('package_weight', trans('system::pages/quote_test.fields.package_weight'), []) !!}
                                {!! Form::input('number', 'package_weight', old('package_weight'), ['class' => 'form-control', 'required' => true, 'min' => 0, 'step' => 'any']) !!}
                                @includeWhen($errors->has('package_weight'), 'administration-ui::partials.forms.field-error', ['field' => 'package_weight'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('package_height', trans('system::pages/quote_test.fields.package_height'), []) !!}
                                {!! Form::input('number', 'package_height', old('package_height'), ['class' => 'form-control', 'required' => true, 'min' => 1]) !!}
                                @includeWhen($errors->has('package_height'), 'administration-ui::partials.forms.field-error', ['field' => 'package_height'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('package_width', trans('system::pages/quote_test.fields.package_width'), []) !!}
                                {!! Form::input('number', 'package_width', old('package_width'), ['class' => 'form-control', 'required' => true, 'min' => 1]) !!}
                                @includeWhen($errors->has('package_width'), 'administration-ui::partials.forms.field-error', ['field' => 'package_width'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('package_length', trans('system::pages/quote_test.fields.package_length'), []) !!}
                                {!! Form::input('number', 'package_length', old('package_length'), ['class' => 'form-control', 'required' => true, 'min' => 1]) !!}
                                @includeWhen($errors->has('package_length'), 'administration-ui::partials.forms.field-error', ['field' => 'package_length'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('product_type', trans('system::pages/quote_test.fields.product_type'), []) !!}
                                {!! Form::select('product_type', $product_types,  old('product_type'), ['class' => 'form-control select2 hidden-search', 'required' => true]) !!}
                                @includeWhen($errors->has('product_type'), 'administration-ui::partials.forms.field-error', ['field' => 'product_type'])
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('content_type', trans('system::pages/quote_test.fields.content_type'), []) !!}
                                {!! Form::text('content_type', old('content_type'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('content_type'), 'administration-ui::partials.forms.field-error', ['field' => 'content_type'])
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('declared_worth', trans('system::pages/quote_test.fields.declared_worth'), []) !!}
                                {!! Form::input('number', 'declared_worth', old('declared_worth'), ['class' => 'form-control', 'required' => true, 'min' => 0, 'step' => 'any']) !!}
                                @includeWhen($errors->has('declared_worth'), 'administration-ui::partials.forms.field-error', ['field' => 'declared_worth'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('delivery_time', trans('system::pages/quote_test.fields.delivery_time'), []) !!}
                                {!! Form::select('delivery_time', $delivery_services,  old('delivery_time'), ['class' => 'form-control select2 hidden-search', 'required' => true]) !!}
                                @includeWhen($errors->has('delivery_time'), 'administration-ui::partials.forms.field-error', ['field' => 'delivery_time'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row justify-content-end">
                <div class="col-12 btn-demo">
                    {!! Form::submit(trans('system::pages/quote_test.fields.submit.quote'), [
                        'class' => 'btn btn-info float-right btn-submit',
                        'name' => 'quote',
                        'title' => trans('system::pages/quote_test.fields.submit.quote')
                        ]) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent
@endsection

@section('styles')
    @parent
@endsection
