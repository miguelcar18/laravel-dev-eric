<?php

namespace Packages\News\Transformers\Datatables;

use League\Fractal;
use Packages\News\Models\Author;

class AuthorTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Author $author)
    {
        return [
            'DT_RowId' => $author->id,
            'id' => $author->id,
            'can_delete' => !empty(request()->user()) && request()->user()->can('delete', $author) && empty($author->deleted_at ?? null),
            'can_edit' => !empty(request()->user()) && request()->user()->can('update', $author) && empty($author->deleted_at ?? null),
            'created_at' => $author->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $author->deleted_at ?? null) ? false : $deleted_at->toW3cString(),
            'delete_route' => route('news::author.destroy', $author),
            'edit_route' => route('news::author.edit', $author),
            'email' => $author->email,
            'mobile' => $author->phone,
            'name' => $author->name,
            'status' => empty($author->deleted_at ?? null) ? __('Active') : __('Removed'),
        ];
    }
}
