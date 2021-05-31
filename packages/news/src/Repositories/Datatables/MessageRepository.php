<?php

namespace Packages\News\Repositories\Datatables;

use Packages\News\Models\Message;
use Packages\News\Repositories\AbstractRepository;
use Packages\Admin\Traits\WorksWithDatatables;

class MessageRepository extends AbstractRepository
{
    use WorksWithDatatables;

    public function __construct(Message $model)
    {
        $this->model = $model;
    }
}
