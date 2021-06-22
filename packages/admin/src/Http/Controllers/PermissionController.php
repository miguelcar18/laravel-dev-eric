<?php

namespace Packages\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Packages\Admin\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin::permission.index');
    }

    public function create()
    {
        return view('admin::permission.create');
    }

    public function store(Request $request)
    {
        $permission = new Permission($request->only('name', 'slug', 'description'));
        $permission->save();

        return redirect()->route('admin::permission.index')->withSuccess(__('Permission created'));
    }

    public function show(Permission $permission)
    {
        return view('admin::permission.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('admin::permission.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);

        return redirect()->route('admin::permission.index')->withSuccess(__('Permission updated'));
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin::permission.index')->withSuccess(__('Permission deleted'));
    }
}
