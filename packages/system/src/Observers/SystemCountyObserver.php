<?php

namespace Packages\System\Observers;

use Packages\System\Models\SystemCounty;
use Uuid;

class SystemCountyObserver
{
    public function creating(SystemCounty $systemCounty)
    {
        $systemCounty->id = $systemCounty->id ?: (string) Uuid::generate(4);
    }

    /**
     * Handle the ChilexpressCounty "created" event.
     *
     * @param  \Packages\System\Models\SystemCounty  $chilexpressCounty
     * @return void
     */
    public function created(SystemCounty $systemCounty)
    {
        //
    }

    public function updating(SystemCounty $systemCounty)
    {
        //
    }

    /**
     * Handle the ChilexpressCounty "updated" event.
     *
     * @param  \Packages\System\Models\SystemCounty  $chilexpressCounty
     * @return void
     */
    public function updated(SystemCounty $systemCounty)
    {
        //
    }

    public function saving(SystemCounty $systemCounty)
    {

    }

    public function saved(SystemCounty $systemCounty)
    {

    }

    public function deleting(SystemCounty $systemCounty)
    {

    }

    /**
     * Handle the ChilexpressCounty "deleted" event.
     *
     * @param  \Packages\System\Models\SystemCounty  $chilexpressCounty
     * @return void
     */
    public function deleted(SystemCounty $systemCounty)
    {
        //
    }

    public function restoring(SystemCounty $systemCounty)
    {

    }

    /**
     * Handle the ChilexpressCounty "restored" event.
     *
     * @param  \Packages\System\Models\SystemCounty  $chilexpressCounty
     * @return void
     */
    public function restored(SystemCounty $systemCounty)
    {
        //
    }

    /**
     * Handle the ChilexpressCounty "force deleted" event.
     *
     * @param  \Packages\System\Models\SystemCounty  $chilexpressCounty
     * @return void
     */
    public function forceDeleted(SystemCounty $systemCounty)
    {
        //
    }
}
