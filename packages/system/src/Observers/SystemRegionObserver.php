<?php

namespace Packages\System\Observers;

use Packages\System\Models\SystemRegion;
use Uuid;

class SystemRegionObserver
{
    public function creating(SystemRegion $systemRegion)
    {
        $systemRegion->id = $systemRegion->id ?: (string) Uuid::generate(4);
    }

    /**
     * Handle the ChilexpressRegion "created" event.
     *
     * @param  \Packages\System\Models\SystemRegion  $chilexpressRegion
     * @return void
     */
    public function created(SystemRegion $systemRegion)
    {
        //
    }

    public function updating(SystemRegion $systemRegion)
    {
        //
    }

    /**
     * Handle the ChilexpressRegion "updated" event.
     *
     * @param  \Packages\System\Models\SystemRegion  $chilexpressRegion
     * @return void
     */
    public function updated(SystemRegion $systemRegion)
    {
        //
    }

    public function saving(SystemRegion $systemRegion)
    {

    }

    public function saved(SystemRegion $systemRegion)
    {

    }

    public function deleting(SystemRegion $systemRegion)
    {

    }

    /**
     * Handle the ChilexpressRegion "deleted" event.
     *
     * @param  \Packages\System\Models\SystemRegion  $chilexpressRegion
     * @return void
     */
    public function deleted(SystemRegion $systemRegion)
    {
        //
    }

    public function restoring(SystemRegion $systemRegion)
    {

    }

    /**
     * Handle the ChilexpressRegion "restored" event.
     *
     * @param  \Packages\System\Models\SystemRegion  $chilexpressRegion
     * @return void
     */
    public function restored(SystemRegion $systemRegion)
    {
        //
    }

    /**
     * Handle the ChilexpressRegion "force deleted" event.
     *
     * @param  \Packages\System\Models\SystemRegion  $chilexpressRegion
     * @return void
     */
    public function forceDeleted(SystemRegion $systemRegion)
    {
        //
    }
}
