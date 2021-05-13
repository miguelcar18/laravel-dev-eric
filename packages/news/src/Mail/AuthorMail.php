<?php

namespace Packages\News\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthorMail extends Mailable
{
    use Queueable, SerializesModels;
    public $author;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($author)
    {
        $this->author = $author;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('news::emails.author.correo');
    }
}
