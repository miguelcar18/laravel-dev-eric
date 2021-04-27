<?php

namespace App\Listeners\Packages\System\Listeners;

use App\Events\Packakes\System\Events\PrimerEvento;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PrimerListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PrimerEvento  $event
     * @return void
     */
    public function handle(PrimerEvento $event)
    {
        //
    }
}
