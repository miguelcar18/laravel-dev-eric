<?php

namespace Packages\System\Observers;

use Packages\System\Models\SystemArticles;
use Uuid;

class SystemArticleObserver
{
    public function creating(SystemArticle $systemArticle)
    {
        $systemArticle->id = $systemArticle->id ?: (string) Uuid::generate(4);
    }

    /**
     * Handle the ChilexpressRegion "created" event.
     *
     * @param  \Packages\System\Models\SystemArticle  $chilexpressArticle
     * @return void
     */
    public function created(SystemArticle $systemArticle)
    {
        //
    }

    public function updating(SystemArticle $systemArticle)
    {
        //
    }

    /**
     * Handle the ChilexpressRegion "updated" event.
     *
     * @param  \Packages\System\Models\SystemArticle  $chilexpressArticle
     * @return void
     */
    public function updated(SystemArticle $systemArticle)
    {
        //
    }

    public function saving(SystemArticle $systemArticle)
    {

    }

    public function saved(SystemArticle $systemArticle)
    {

    }

    public function deleting(SystemArticle $systemArticle)
    {

    }

    /**
     * Handle the ChilexpressRegion "deleted" event.
     *
     * @param  \Packages\System\Models\SystemArticle  $chilexpressArticle
     * @return void
     */
    public function deleted(SystemArticle $systemArticle)
    {
        //
    }

    public function restoring(SystemArticle $systemArticle)
    {

    }

    /**
     * Handle the ChilexpressRegion "restored" event.
     *
     * @param  \Packages\System\Models\SystemArticle  $chilexpressArticle
     * @return void
     */
    public function restored(SystemArticle $systemArticle)
    {
        //
    }

    /**
     * Handle the ChilexpressRegion "force deleted" event.
     *
     * @param  \Packages\System\Models\SystemArticle  $chilexpressArticle
     * @return void
     */
    public function forceDeleted(SystemArticle $systemArticle)
    {
        //
    }
}
