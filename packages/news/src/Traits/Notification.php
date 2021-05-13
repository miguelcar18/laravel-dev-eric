<?php

namespace Packages\News\Traits;

use Packages\News\Events\ArticleEvent;
use Packages\News\Events\AuthorEvent;

trait Notification
{
    public function mailNotify($data)
    {
        if ($data->dni <> null)
        {
            event(new AuthorEvent($data));

            return redirect()->route('authors.index');

        }elseif ($data->title <> null)
        {
            event(new ArticleEvent());

            return redirect()->route('news_articles.index');
        }
    }
}
