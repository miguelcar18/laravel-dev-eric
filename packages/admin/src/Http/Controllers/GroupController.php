<?php

namespace Packages\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Packages\Admin\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        return view('admin::group.index');
    }

    public function create()
    {
        return view('admin::group.create');
    }

    public function store(Request  $request)
    {
        $group = new Group($request->all());
        $group->save();

        return redirect()->route('admin::group.index')->withSuccess(__('Group created'));
    }

    public function show(Group $group)
    {
        return view('admin::group.show',compact('group'));
    }

    public function edit(Group $group)
    {
        return view('admin::group.edit',compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $group->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);

        return redirect()->route('admin::group.index')->withSuccess(__('Group updated'));
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('admin::group.index')->withSuccess(__('Group deleted'));
    }
}
