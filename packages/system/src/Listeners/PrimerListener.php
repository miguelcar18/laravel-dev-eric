<?php

namespace Packages\System\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Packages\System\Mail\SystemUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Packages\System\Events\PrimerEvento;


class PrimerListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'database';

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'default';

    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 60;

    /**
     * The Number of attempts to send notifications.
     *
     * @var int
     */
    public $tries = 3;

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
        Mail::to($event->user->email)
            ->cc($$event->user->name)
            ->bcc($event->user->name)
            ->send(new SystemUser($event->user));
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
}
