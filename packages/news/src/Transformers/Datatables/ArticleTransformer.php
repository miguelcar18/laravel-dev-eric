<?php

namespace Packages\News\Transformers\Datatables;

use League\Fractal;
use Packages\News\Models\Article;

class ArticleTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'DT_RowId' => $article->id,
            'id' => $article->id,
            'can_delete' => !empty(request()->user()) && request()->user()->can('delete', $article) && empty($article->deleted_at ?? null),
            'can_edit' => !empty(request()->user()) && request()->user()->can('update', $article) && empty($article->deleted_at ?? null),
            'can_show' => !empty(request()->user()) && request()->user()->can('show', $article) && empty($article->deleted_at ?? null),
            'created_at' => $article->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $article->deleted_at ?? null) ? false : $deleted_at->toW3cString(),
            'delete_route' => route('news::article.destroy', $article),
            'edit_route' => route('news::article.edit', $article),
            'show_route' => route('news::article.show', $article),
            'title' => $article->title,
            'subtitle' => $article->subtitle,
            'section' => $article->section,
            'author_id' => $article->author_id,
            'status' => empty($article->deleted_at ?? null) ? __('Active') : __('Removed'),
        ];
    }
}
