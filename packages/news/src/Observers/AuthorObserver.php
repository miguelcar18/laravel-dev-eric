<?php

namespace Packages\News\Observers;

use Packages\News\Models\Author;
use Uuid;

class AuthorObserver
{
    public function creating(Author $author)
    {
        $author->id = $author->id ?: (string) Uuid::generate(4);
    }
}
