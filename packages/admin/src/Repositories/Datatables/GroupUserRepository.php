<?php

namespace Packages\Admin\Repositories\Datatables;

use Packages\Admin\Models\User;
use Packages\Admin\Repositories\AbstractRepository;
use Packages\Admin\Traits\WorksWithDatatables;

class GroupUserRepository extends AbstractRepository
{
    use WorksWithDatatables;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
