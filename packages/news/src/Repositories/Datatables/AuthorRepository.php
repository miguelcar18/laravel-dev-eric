<?php

namespace Packages\News\Repositories\Datatables;

use Packages\News\Models\Author;
use Packages\News\Repositories\AbstractRepository;
use Packages\Admin\Traits\WorksWithDatatables;

class AuthorRepository extends AbstractRepository
{
    use WorksWithDatatables;

    public function __construct(Author $model)
    {
        $this->model = $model;
    }
}
