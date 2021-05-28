@extends('admin::layouts.app')

@section('page-title')
    {{ trans('news::pages/author.edit.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('news::pages/author.edit.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['text' => trans('news::pages/author.edit.breadcrumb')]
]])
@endsection

@section('page-content')

    {!! Form::open(['route' => ['news::author.update', $author], 'class' => 'has-max-width']) !!}
    {{ method_field('PUT') }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('dni', trans('news::pages/author.fields.dni'), []) !!}
                                {!! Form::text('dni', old('dni') ?? $author->dni, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('dni'), 'admin::partials.forms.field-error', ['field' => 'dni'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('email', trans('news::pages/author.fields.email'), []) !!}
                                {!! Form::email('email', old('email') ?? $author->email, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('email'), 'admin::partials.forms.field-error', ['field' => 'email'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', trans('news::pages/author.fields.name'), []) !!}
                                {!! Form::text('name', old('name') ?? $author->name, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('name'), 'admin::partials.forms.field-error', ['field' => 'name'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('lastName', trans('news::pages/author.fields.lastName'), []) !!}
                                {!! Form::text('lastName', old('lastName') ?? $author->lastName, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('lastName'), 'admin::partials.forms.field-error', ['field' => 'lastName'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('phone', trans('news::pages/author.fields.phone'), []) !!}
                                {!! Form::text('phone', old('phone') ?? $author->phone, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('phone'), 'admin::partials.forms.field-error', ['field' => 'phone'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row justify-content-end">
                <a class="btn btn-secondary" href="{{ route('news::author.index') }}" title="{{ __('Cancel') }}">{{ __('Cancel') }}</a>
                {!! Form::hidden('return_to', 'news::author.index') !!}&nbsp;
                &nbsp;&nbsp;
                {!! Form::submit(trans('news::pages/author.fields.submit.save'), ['class' => 'btn btn-info float-right', 'title' => trans('admin::pages/customer.fields.submit.save')]) !!}

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
