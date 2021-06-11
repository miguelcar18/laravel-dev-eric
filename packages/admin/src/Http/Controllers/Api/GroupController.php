<?php

namespace Packages\Admin\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;
use Illuminate\Http\Request;
use Packages\Admin\Repositories\Datatables\GroupRepository;
use Packages\Admin\Transformers\Datatables\GroupTransformer;

class GroupController extends Controller
{
    protected $group;

    public function  __construct(ApiResponse $response, GroupRepository $group)
    {
        parent::__construct($response);
        $this->group = $group;
    }

    public function index()
    {
        $groups = $this->group->paginate(true);
        return $this->response->withPaginator($groups, new GroupTransformer, null, [
            'draw' => intval(request()->draw),
        ]);
    }
}
