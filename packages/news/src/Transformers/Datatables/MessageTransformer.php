<?php

namespace Packages\News\Transformers\Datatables;

use League\Fractal;
use Packages\News\Models\Message;

class MessageTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Message $message)
    {
        return [
            'DT_RowId' => $message->id,
            'id' => $message->id,
            'can_delete' => !empty(request()->user()) && request()->user()->can('delete', $message) && empty($message->deleted_at ?? null),
            'can_edit' => !empty(request()->user()) && request()->user()->can('update', $message) && empty($message->deleted_at ?? null),
            'can_show' => !empty(request()->user()) && request()->user()->can('show', $message) && empty($message->deleted_at ?? null),
            'created_at' => $message->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $message->deleted_at ?? null) ? false : $deleted_at->toW3cString(),
            'delete_route' => route('news::message.destroy', $message),
            'edit_route' => route('news::message.edit', $message),
            'show_route' => route('news::message.show', $message),
            'name' => $message->name,
            'subject' => $message->subject,
            'sender_email' => $message->sender_email,
            'answer_to' => $message->answer_to,
            'status' => empty($message->deleted_at ?? null) ? __('Active') : __('Removed'),
        ];
    }
}
