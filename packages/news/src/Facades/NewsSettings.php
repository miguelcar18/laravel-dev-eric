<?php

namespace Packages\News\Facades;

use Illuminate\Support\Facades\Facade;

class NewsSettings extends Facade
{
    public static function getFacadeAccessor()
    {
        return NewsSettings::class;
    }
}
