<?php

namespace Packages\Admin\Repositories\Datatables;

use Packages\Admin\Models\Group;
use Packages\Admin\Repositories\AbstractRepository;
use Packages\Admin\Traits\WorksWithDatatables;

class GroupRepository extends AbstractRepository
{
    use WorksWithDatatables;

    public function __construct(Group $model)
    {
        $this->model = $model;
    }
}
