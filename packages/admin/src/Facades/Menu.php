<?php
namespace Packages\Admin\Facades;

use Illuminate\Support\Facades\Facade;
use Packages\Admin\Models\Menu as MenuObject;

class Menu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MenuObject::class;
    }

}
