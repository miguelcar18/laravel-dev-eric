<?php

namespace Packages\Admin\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Packages\Admin\Models\Group;
use Packages\Admin\Models\Permission;
use Packages\Admin\Repositories\Datatables\GroupPermissionRepository;
use Packages\Admin\Transformers\Datatables\GroupPermissionTransformer;

class GroupPermissionController extends Controller
{
    protected $groupPermission;

    public function __construct(ApiResponse $response, GroupPermissionRepository $groupPermissionRepository)
    {
        parent::__construct($response);
        $this->groupPermission = $groupPermissionRepository;
    }

    public function groupPermission()
    {
        $permissions = $this->groupPermission->paginate(true);
        return $this->response->withPaginator($permissions, new GroupPermissionTransformer(), null, [
            'draw' => intval(request()->draw),
        ]);
    }

    public function assignPermission(Request $request)
    {
        $group = Group::find($request->group_id);
        $data = ($request->isChecked == 1) ? $group->assignPermissions($request->permission_id) : $group->revokePermissions($request->permission_id);

        return response()->json(['change'],200);
    }


}
