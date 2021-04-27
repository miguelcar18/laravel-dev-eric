<?php

namespace Packages\System\Listeners;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Packages\System\Events\PrimerEvento;
use Packages\System\Models\SystemUser;

class PrimerListener
{
    use InteractsWithQueue;

    public $event;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(PrimerEvento $event)
    {
        $event->user;
        Mail::to($event->user->email)
            ->cc($$event->user->name)
            ->bcc($event->user->name)
            ->send(new SystemUser($event->user->email));
    }

    public function failed(MiPrimerEvent $event, $exception)
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
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
