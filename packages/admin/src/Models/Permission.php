<?php

namespace Packages\Admin\Models;

use Junges\ACL\Http\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    protected $casts = [
        'is_hidden' => 'boolean',
    ];

    public function toggle()
    {
        $this->is_hidden = !$this->is_hidden;
        $this->save();
        return $this;
    }

    public function scopeHidden($q)
    {
        return $q->where('is_hidden', true);
    }

    public function scopeNotHidden($q)
    {
        return $q->where('is_hidden', false);
    }

    public function getTranslatedNameAttribute()
    {
        return __($this->slug);
    }
}
