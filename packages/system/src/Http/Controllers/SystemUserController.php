<?php

namespace Packages\System\Http\Controllers;

use Packages\System\Events\PrimerEvento;
use Packages\System\Http\Requests\SystemUser\StoreRequest;
use Packages\System\Http\Requests\SystemUser\UpdateRequest;
use Packages\System\Models\SystemUser;
use Illuminate\Http\Request;

class SystemUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = SystemUser::orderBy('created_at','DESC')->paginate(10);
//        dd($user);

        return view('test::users.index')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test::users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = new SystemUser;
        $user->rut = $request->rut;
        $user->name = $request->name;
        $user->maternalName = $request->maternalName;
        $user->paternalName = $request->paternalName;
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->nationality = $request->nationality;
        $user->save();

        event(new PrimerEvento($user));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = SystemUser::findOrFail($id);

        return view('test::users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = SystemUser::findOrFail($id);

        return view('test::users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = SystemUser::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SystemUser::destroy($id);

        return redirect()->route('articles.index');
    }
}
