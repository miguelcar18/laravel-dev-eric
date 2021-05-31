<?php

namespace Packages\News\Observers;

use Packages\News\Models\Message;
use Uuid;

class MessageObserver
{
    public function creating(Message $message)
    {
        $message->id = $message->id ?: (string) Uuid::generate(4);
    }
}
