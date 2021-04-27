<?php

namespace Packages\System\Listeners;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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

    public function handle( $event)
    {
//        $event->user;
//        Mail::to($event->user->name)
//            ->cc($$event->user->name)
//            ->bcc($event->user->name)
//            ->send(new OrderShipped($event->user->email));
        $email = $event->user->email;
        Mail::to($event->user->name)
            ->cc($$event->user->name)
            ->bcc($event->user->name)
            ->send($email);

    }

    public function failed()
    {

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
