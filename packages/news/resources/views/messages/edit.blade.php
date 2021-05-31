@extends('admin::layouts.app')

@section('page-title')
    {{ trans('news::pages/message.edit.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('news::pages/message.edit.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['text' => trans('news::pages/message.edit.breadcrumb')]
]])
@endsection

@section('page-content')
    {!! Form::open(['route' => ['news::message.update', $message], 'class' => 'has-max-width']) !!}
    {{ method_field('PUT') }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', trans('news::pages/message.fields.name'), []) !!}
                                {!! Form::text('name', old('name')?? $message->name, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('name'), 'admin::partials.forms.field-error', ['field' => 'name'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('subject', trans('news::pages/message.fields.subject'), []) !!}
                                {!! Form::text('subject', old('subject') ?? $message->subject, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('subject'), 'admin::partials.forms.field-error', ['field' => 'subject'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('sender_name', trans('news::pages/message.fields.sender_name'), []) !!}
                                {!! Form::text('sender_name', old('sender_name') ?? $message->sender_name, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('sender_name'), 'admin::partials.forms.field-error', ['field' => 'sender_name'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('sender_email', trans('news::pages/message.fields.sender_email'), []) !!}
                                {!! Form::text('sender_email', old('sender_email') ?? $message->sender_email, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('sender_email'), 'admin::partials.forms.field-error', ['field' => 'sender_email'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('answer_to', trans('news::pages/message.fields.answer_to'), []) !!}
                                {!! Form::text('answer_to', old('answer_to') ?? $message->answer_to, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('answer_to'), 'admin::partials.forms.field-error', ['field' => 'answer_to'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('footer_text', trans('news::pages/message.fields.footer_text'), []) !!}
                                {!! Form::text('footer_text', old('footer_text') ?? $message->footer_text, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('footer_text'), 'admin::partials.forms.field-error', ['field' => 'footer_text'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('content', trans('news::pages/message.fields.content'), []) !!}
                                {!! Form::textarea('content', old('content') ?? $message->content, ['class' => 'form-control', 'required' => true ]) !!}
                                @includeWhen($errors->has('content'), 'admin::partials.forms.field-error', ['field' => 'content'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row justify-content-end">
                <div class="btn-demo">
                    <a class="btn btn-secondary" href="{{ route('news::article.index') }}" title="{{ __('Cancel') }}">{{ __('Cancel') }}</a>
                    {!! Form::hidden('return_to', 'news::article.index') !!}&nbsp;
                </div>
                <div class="btn-demo">
                    {!! Form::submit(__("Save and create another"), [
                            'class' => 'btn btn-info float-right',
                            'name' => 'create_another',
                            'title' => __("Save and create another")
                            ]) !!}
                </div> &nbsp;&nbsp;
                <div class="btn-demo">
                    {!! Form::submit(trans('news::pages/article.fields.submit.save'), [
                        'class' => 'btn btn-info float-right',
                        'name' => 'save',
                        'title' => trans('news::pages/article.fields.submit.save')
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
