<?php

namespace Packages\Admin\Observers;

use Packages\Admin\Models\User;
use Uuid;

class UserObserver
{
    public function creating(User $user)
    {
        $user->id = $user->id ?: (string) Uuid::generate(4);
    }
}
