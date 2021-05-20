<?php

namespace Packages\Admin\Repositories\Datatables;

use Packages\Admin\Models\Customer;
use Packages\Admin\Repositories\AbstractRepository;
use Packages\Admin\Traits\WorksWithDatatables;

class CustomerRepository extends AbstractRepository
{
    use WorksWithDatatables;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }
}
