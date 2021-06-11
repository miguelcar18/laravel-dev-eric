<?php

namespace Packages\Admin\Observers;

use Packages\Admin\Models\Group;
use Uuid;

class GroupObserver
{
    public function creating(Group $group)
    {
        $group->id = $group->id ?: (string) Uuid::generate(4);
    }
}
