<?php

namespace Packages\System\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Packages\System\Events\PrimerEvento;
use Packages\System\Mail\SystemUser;
use Packages\System\Notifications\PrimeraNotificacion;

class PrimerListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(PrimerEvento $event)
    {
        $event->user->notify(new PrimeraNotificacion($event->user));
    }

    public function failed(PrimerEvento $event, $exception)
    {
        Log::error("Ha ocurrido un error al enviar el correo.", [
            'user' => $event->user,
            'errors' => json_encode($exception->getMessage()),
            'code' => $exception->getCode(),
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
}
