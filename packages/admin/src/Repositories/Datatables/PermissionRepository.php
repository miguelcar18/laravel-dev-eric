<?php

namespace Packages\Admin\Repositories\Datatables;

use Packages\Admin\Models\Permission;
use Packages\Admin\Repositories\AbstractRepository;
use Packages\Admin\Traits\WorksWithDatatables;

class PermissionRepository extends AbstractRepository
{
    use WorksWithDatatables;

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
}
