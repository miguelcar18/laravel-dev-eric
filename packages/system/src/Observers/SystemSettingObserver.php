<?php

namespace Packages\System\Observers;

use Packages\System\Models\SystemSetting;
use Uuid;

class SystemSettingObserver
{
    public function creating(SystemSetting $systemSetting)
    {
        $systemSetting->id = $systemSetting->id ?: (string) Uuid::generate(4);
        $systemSetting->name = $systemSetting->name ?: $systemSetting->slug;
    }

    /**
     * Handle the chilexpress api setting "created" event.
     *
     * @param  \Packages\System\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function created(SystemSetting $systemSetting)
    {
        //
    }

    public function updating(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the chilexpress api setting "updated" event.
     *
     * @param  \Packages\System\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function updated(SystemSetting $systemSetting)
    {
        //
    }

    public function saving(SystemSetting $systemSetting)
    {
        //
    }

    public function saved(SystemSetting $systemSetting)
    {
        //
    }

    public function deleting(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the chilexpress api setting "deleted" event.
     *
     * @param  \Packages\System\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function deleted(SystemSetting $systemSetting)
    {
        //
    }

    public function restoring(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the chilexpress api setting "restored" event.
     *
     * @param  \Packages\System\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function restored(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the chilexpress api setting "force deleted" event.
     *
     * @param  \Packages\System\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function forceDeleted(SystemSetting $systemSetting)
    {
        //
    }
}
