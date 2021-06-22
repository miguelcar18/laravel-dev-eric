<?php

namespace Packages\Admin\Transformers\Datatables;

use League\Fractal;
use Packages\Admin\Models\Group;

class GroupTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Group $group)
    {
        return [
            'DT_RowId' => $group->id,
            'id' => $group->id,
            'can_delete' => !empty(request()->user()) && request()->user()->can('delete', $group) && empty($group->deleted_at),
            'can_edit' => !empty(request()->user()) && request()->user()->can('update', $group) && empty($group->deleted_at),
            'created_at' => $group->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $group->deleted_at) ? false : $deleted_at->toW3cString(),
            'delete_route' => route('admin::group.destroy', $group),
            'edit_route' => route('admin::group.edit', $group),
            'assign_permission_route' => route('admin::group.group_permission', $group),
            'name' => $group->name,
            'slug' => $group->slug,
            'description' => $group->description,
            'status' => empty($group->deleted_at) ? __('Active') : __('Removed'),
        ];
    }
}
