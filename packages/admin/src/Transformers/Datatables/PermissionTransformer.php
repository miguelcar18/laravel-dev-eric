<?php

namespace Packages\Admin\Transformers\Datatables;

use League\Fractal;
use Packages\Admin\Models\Permission;

class PermissionTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Permission $permission)
    {
        return [
            'DT_RowId' => $permission->id,
            'id' => $permission->id,
            'can_delete' => !empty(request()->user()) && request()->user()->can('delete', $permission) && empty($permission->deleted_at),
            'can_edit' => !empty(request()->user()) && request()->user()->can('update', $permission) && empty($permission->deleted_at),
            'created_at' => $permission->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $permission->deleted_at) ? false : $deleted_at->toW3cString(),
            'delete_route' => route('admin::permission.destroy', $permission),
            'edit_route' => route('admin::permission.edit', $permission),
            'name' => $permission->name,
            'slug' => $permission->slug,
            'description' => $permission->description,
            'status' => empty($permission->deleted_at) ? __('Active') : __('Removed'),
        ];
    }
}
