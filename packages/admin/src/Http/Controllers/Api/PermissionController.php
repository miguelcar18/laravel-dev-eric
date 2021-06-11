<?php

namespace Packages\Admin\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;
use Illuminate\Http\Request;
use Packages\Admin\Http\Controllers\Api\Controller;
use Packages\Admin\Repositories\Datatables\PermissionRepository;
use Packages\Admin\Transformers\Datatables\PermissionTransformer;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct(ApiResponse $response, PermissionRepository $permission)
    {
        parent::__construct($response);
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->paginate(true);
        return $this->response->withPaginator($permissions, new PermissionTransformer, null, [
            'draw' => intval(request()->draw),
        ]);
    }
}
