<?php

namespace Packages\System\Observers;

use Packages\System\Models\SystemUser;
use Uuid;

class SystemUserObserver
{
    public function creating(SystemUser $systemUser)
    {
        $systemUser->id = $systemUser->id ?: (string) Uuid::generate(4);
    }

    /**
     * Handle the ChilexpressRegion "created" event.
     *
     * @param  \Packages\System\Models\SystemUser  $chilexpressUser
     * @return void
     */
    public function created(SystemUser $systemUser)
    {
        //
    }

    public function updating(SystemUser $systemUser)
    {
        //
    }

    /**
     * Handle the ChilexpressRegion "updated" event.
     *
     * @param  \Packages\System\Models\SystemUser  $chilexpressUser
     * @return void
     */
    public function updated(SystemUser $systemUser)
    {
        //
    }

    public function saving(SystemUser $systemUser)
    {

    }

    public function saved(SystemUser $systemUser)
    {

    }

    public function deleting(SystemUser $systemUser)
    {

    }

    /**
     * Handle the ChilexpressRegion "deleted" event.
     *
     * @param  \Packages\System\Models\SystemUser  $chilexpressUser
     * @return void
     */
    public function deleted(SystemUser $systemUser)
    {
        //
    }

    public function restoring(SystemUser $systemUser)
    {

    }

    /**
     * Handle the ChilexpressRegion "restored" event.
     *
     * @param  \Packages\System\Models\SystemUser  $chilexpressUser
     * @return void
     */
    public function restored(SystemUser $systemUser)
    {
        //
    }

    /**
     * Handle the ChilexpressRegion "force deleted" event.
     *
     * @param  \Packages\System\Models\SystemUser  $chilexpressUser
     * @return void
     */
    public function forceDeleted(SystemUser $systemUser)
    {
        //
    }
}
