<?php

namespace Packages\System\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Packages\System\Events\RegisterEvent;
use Packages\System\Notifications\RegisterNotify;

class RegisterListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(RegisterEvent $event)
    {
        $event->user->notify(new RegisterNotify($event->user));
    }

    public function failed(RegisterEvent $event, $exception)
    {
        Log::error("Ha ocurrido un error al enviar el correo.",[
            'user'  =>  $event->user,
            'errors'    =>  json_encode($exception->getMessage()),
            'code'  =>  $exception->getCode(),
        ]);
    }
}
