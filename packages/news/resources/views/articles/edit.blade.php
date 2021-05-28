@extends('admin::layouts.app')

@section('page-title')
    {{ trans('news::pages/article.edit.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('news::pages/article.edit.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['text' => trans('news::pages/article.edit.breadcrumb')]
]])
@endsection

@section('page-content')
    {!! Form::open(['route' => ['news::article.update', $article], 'class' => 'has-max-width']) !!}
    {{ method_field('PUT') }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title', trans('news::pages/article.fields.title'), []) !!}
                                {!! Form::text('title', old('title') ?? $article->title, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('title'), 'admin::partials.forms.field-error', ['field' => 'title'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('subtitle', trans('news::pages/article.fields.subtitle'), []) !!}
                                {!! Form::text('subtitle', old('subtitle') ?? $article->subtitle, ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('subtitle'), 'admin::partials.forms.field-error', ['field' => 'subtitle'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('section', trans('news::pages/article.fields.section'), []) !!}
                                {!! Form::select('section', ['deportes' => 'Deportes', 'economia' => 'Economia', 'tecnologia' =>'Tecnologia','entretenimiento' => 'Entretenimiento'], $article->section , ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('section'), 'admin::partials.forms.field-error', ['field' => 'section'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('author_id', trans('news::pages/article.fields.author_id'), []) !!}
                                {!! Form::select('author_id', $author,$article->author_id , ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('author_id'), 'admin::partials.forms.field-error', ['field' => 'author_id'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('body', trans('news::pages/article.fields.body'), []) !!}
                                {!! Form::textarea('body', old('body') ?? $article->body, ['class' => 'form-control', 'required' => true ]) !!}
                                @includeWhen($errors->has('body'), 'admin::partials.forms.field-error', ['field' => 'body'])
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
                    {!! Form::submit(trans('news::pages/article.fields.submit.save'), ['class' => 'btn btn-info float-right', 'title' => trans('admin::pages/customer.fields.submit.save')]) !!}
                </div> &nbsp;&nbsp;
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
