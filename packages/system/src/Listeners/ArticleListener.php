<?php

namespace Packages\System\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Packages\System\Events\ArticleEvent;
use Packages\System\Models\SystemUser;
use Packages\System\Notifications\ArticleNotify;

class ArticleListener implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle()
    {
        $users = SystemUser::all();

        $users->each->notify(new ArticleNotify());
    }

    public function failed( ArticleEvent $event, $exception)
    {
        Log::error("Ha ocurrido un error al enviar el correo.",[
            'errors'    =>  json_encode($exception->$exception->getMessage()),
            'code'  =>  $exception->getCode(),
        ]);
    }
}
