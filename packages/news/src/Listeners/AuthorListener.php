<?php

namespace Packages\News\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Packages\News\Events\AuthorEvent;
use Packages\News\Notifications\AuthorNotify;

class AuthorListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AuthorEvent $event)
    {
        $event->author->notify(new AuthorNotify($event->author));
    }

    public function failed(AuthorEvent $event, $exception)
    {
        Log::error("Ha ocurrido un error al enviar el correo.",[
            'auhtor'  =>  $event->author,
            'errors'    =>  json_encode($exception->getMessage()),
            'code'  =>  $exception->getCode()
        ]);
    }
}
