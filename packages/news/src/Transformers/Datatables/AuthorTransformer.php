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
            'can_delete' => !empty(request()->author()) && request()->author()->can('delete', $author) && empty($author->deleted_at),
            'can_edit' => !empty(request()->author()) && request()->author()->can('update', $author) && empty($author->deleted_at),
            'created_at' => $author->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $author->deleted_at) ? false : $deleted_at->toW3cString(),
            'delete_route' => route('news::author.destroy', $author),
            'edit_route' => route('news::author.edit', $author),
            'email' => $author->email,
            'mobile' => $author->phone,
            'name' => $author->name,
            'status' => empty($author->deleted_at) ? __('Active') : __('Removed'),
        ];
    }
}
