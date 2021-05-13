<?php

namespace Packages\News\Observers;

use Packages\News\Models\Article;
use Uuid;

class ArticleObserver
{
    public function creating(Article $article)
    {
        $article->id = $article->id ?: (string) Uuid::generate(4);
    }
}
