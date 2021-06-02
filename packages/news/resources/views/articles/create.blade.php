@extends('admin::layouts.app')

@section('page-title')
    {{ trans('news::pages/article.create.page_title') }}
@endsection

@section('page-description')
@endsection

@section('page-header')
    - {{ trans('news::pages/article.create.page_header') }}
@endsection

@section('breadcrumbs')
    @include('admin::partials.page.breadcrumbs', [ 'breadcrumbs' => [
    ['text' => trans('news::pages/article.create.breadcrumb')]
]])
@endsection

@section('page-content')
    {!! Form::open(['route' => ['news::article.store'], 'id' => 'create-form', 'class' => 'has-max-width']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title', trans('news::pages/article.fields.title'), []) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('title'), 'admin::partials.forms.field-error', ['field' => 'title'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('subtitle', trans('news::pages/article.fields.subtitle'), []) !!}
                                {!! Form::text('subtitle', old('subtitle'), ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('subtitle'), 'admin::partials.forms.field-error', ['field' => 'subtitle'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('section', trans('news::pages/article.fields.section'), []) !!}
                                {!! Form::select('section', ['deportes' => 'Deportes', 'economia' => 'Economia', 'tecnologia' =>'Tecnologia','entretenimiento' => 'Entretenimiento'], ['placeholder' => 'Categoria del articulo'] , ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('section'), 'admin::partials.forms.field-error', ['field' => 'section'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('author_id', trans('news::pages/article.fields.author_id'), []) !!}
                                {!! Form::select('author_id', $author, ['placeholder' => 'Autor del articulo'] , ['class' => 'form-control', 'required' => true]) !!}
                                @includeWhen($errors->has('author_id'), 'admin::partials.forms.field-error', ['field' => 'author_id'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('body', trans('news::pages/article.fields.body'), []) !!}
                                {!! Form::textarea('body', old('body'), ['class' => ['form-control','textarea_content'], 'required' => true ]) !!}
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

    <script type="text/javascript">
        $('.textarea_content').trumbowyg({
            btns: [
                ['strong', 'em'],
                ['link'],
                ['insertImage']
            ],
            autogrow: true,
            urlProtocol: true,
            imageWidthModalEdit: true,
            minimalLinks: true,
            defaultLinkTarget: '_blank',
            lang: 'es',
        });
    </script>
@endsection

@section('styles')
    @parent
@endsection
