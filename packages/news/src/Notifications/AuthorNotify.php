<?php

namespace Packages\News\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Packages\News\Mail\AuthorMail;

class AuthorNotify extends Notification
{
    use Queueable;
    public $author;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($author)
    {
        $this->author = $author;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new AuthorMail($this->author))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'link'  =>  route('news::authors.show',$this->author->id),
            'title' =>  __('Perfil').' '.$this->author->name,
            'text'  =>  __('Autor creado el '.$this->author->created_at)
        ];
    }
}
