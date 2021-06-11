<?php

namespace Packages\Admin\Observers;

use Packages\Admin\Models\Permission;
use Uuid;

class PermissionObserver
{
    public function creating(Permission $permission)
    {
        $permission->id = $permission->id ?: (string) Uuid::generate(4);
    }
}
