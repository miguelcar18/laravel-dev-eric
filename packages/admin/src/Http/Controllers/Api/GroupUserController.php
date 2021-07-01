<?php

namespace Packages\Admin\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;

use Illuminate\Http\Request;
use Packages\Admin\Models\User;
use Packages\Admin\Repositories\Datatables\GroupUserRepository;
use Packages\Admin\Transformers\Datatables\GroupUserTransformer;

class GroupUserController extends Controller
{
    protected $groupUser;

    public function __construct(ApiResponse $response, GroupUserRepository $groupUserRepository)
    {
        parent::__construct($response);
        $this->groupUser = $groupUserRepository;
    }

    public function groupUser()
    {
        $users = $this->groupUser->paginate(true);
        return $this->response->withPaginator($users, new GroupUserTransformer(), null, [
            'draw' => intval(request()->draw),
        ]);
    }

    public function assignUser(Request $request)
    {
        dd($request->all());
        $group = Group::find($request->group_id);
        $data = ($request->isChecked == 1) ? $group->assignPermissions($request->user_id) : $group->revokePermissions($request->user_id);

        return response()->json(['change'],200);
    }
}
