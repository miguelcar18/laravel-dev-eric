<?php

namespace Packages\Admin\Transformers\Datatables;

use League\Fractal;
use Packages\Admin\Models\User;

class GroupUserTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'DT_RowId' => $user->id,
            'id' => $user->id,
            'can_assign_user' => !empty(request()->user()) && request()->user()->can('assignUser', $user) && empty($user->deleted_at),
            'created_at' => $user->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $user->deleted_at) ? false : $deleted_at->toW3cString(),
            'assign_user_route' => route('admin::api.group.assign_user', $user),
            'name' => $user->name,
            'email' => $user->email,
            'status' => empty($user->deleted_at) ? __('Active') : __('Removed'),
        ];
    }
}
