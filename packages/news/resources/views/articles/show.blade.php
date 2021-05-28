@extends('admin::layouts.app')

@section('page-title')
    {{ trans('news::pages/article.show.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('news::pages/article.show.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['text' => trans('news::pages/article.show.breadcrumb')]
]])
@endsection

@section('page-content')

    <div class="justify-content-center">
        <ul>
            @foreach($article->notifications as $an)
                <li>{{ $an }}</li>
            @endforeach
        </ul>
    </div>

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
                                {!! Form::text('title', old('title') ?? $article->title, ['class' => 'form-control', 'required' => true, 'readonly']) !!}
                                @includeWhen($errors->has('title'), 'admin::partials.forms.field-error', ['field' => 'title'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('subtitle', trans('news::pages/article.fields.subtitle'), []) !!}
                                {!! Form::text('subtitle', old('subtitle') ?? $article->subtitle, ['class' => 'form-control', 'required' => true,'readonly']) !!}
                                @includeWhen($errors->has('subtitle'), 'admin::partials.forms.field-error', ['field' => 'subtitle'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('section', trans('news::pages/article.fields.section'), []) !!}
                                {!! Form::text('section', old('section') ?? $article->section, ['class' => 'form-control', 'required' => true,'readonly']) !!}
                                @includeWhen($errors->has('section'), 'admin::partials.forms.field-error', ['field' => 'section'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('author_id', trans('news::pages/article.fields.author_id'), []) !!}
                                {!! Form::text('author_id', old('author_id') ?? $author->name .' '.$author->lastName , ['class' => 'form-control', 'required' => true,'readonly']) !!}
                                @includeWhen($errors->has('author_id'), 'admin::partials.forms.field-error', ['field' => 'author_id'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('body', trans('news::pages/article.fields.body'), []) !!}
                                {!! Form::textarea('body', old('body') ?? $article->body, ['class' => 'form-control', 'required' => true, 'readonly' ]) !!}
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
                    <a class="btn btn-secondary" href="{{ route('news::article.index') }}" title="{{ __('Atras') }}">{{ __('Atras') }}</a>
                    {!! Form::hidden('return_to', 'news::article.index') !!}
                </div> &nbsp;&nbsp;
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
