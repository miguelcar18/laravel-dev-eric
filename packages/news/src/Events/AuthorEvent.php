<?php

namespace Packages\News\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AuthorEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $author;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($author)
    {
        $this->author = $author;
    }

}
