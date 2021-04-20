<?php

namespace Packages\System\Facades;

use Packages\System\Models\SystemSetting;
use Illuminate\Support\Facades\Facade;

class SystemSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SystemSetting::class;
    }
}
