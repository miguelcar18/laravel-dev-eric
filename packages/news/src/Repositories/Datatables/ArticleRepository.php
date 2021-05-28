<?php

namespace Packages\News\Repositories\Datatables;

use Packages\News\Models\Article;
use Packages\News\Repositories\AbstractRepository;
use Packages\Admin\Traits\WorksWithDatatables;

class ArticleRepository extends AbstractRepository
{
    use WorksWithDatatables;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }
}
