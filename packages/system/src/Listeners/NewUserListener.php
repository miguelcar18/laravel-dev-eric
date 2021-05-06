<?php

namespace  Packages\System\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Packages\System\Events\NewUserEvent;
use Packages\System\Notifications\NewUserNotify;

class NewUserListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NewUserEvent $event)
    {
        $event->user->notify(new NewUserNotify($event->user));
    }

    public function failed( NewUserEvent $event, $exception)
    {
        Log::error("Ha ocurrido un error al enviar el correo.", [
            'user'  =>  $event->user,
            'errors'    =>  json_encode($exception->getMessage()),
            'code'  =>  $exception->getCode()
        ]);
    }
}
