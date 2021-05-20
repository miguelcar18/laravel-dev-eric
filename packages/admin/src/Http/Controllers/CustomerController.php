<?php

namespace Packages\Admin\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Packages\Admin\Http\Requests\Customer\StoreRequest;
use Packages\Admin\Http\Requests\Customer\UpdateRequest;
use Packages\Admin\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Packages\Admin\Http\Requests\Customer\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $customer = new Customer($request->only('name', 'email', 'mobile'));
            $customer->save();
        });

        return ($request->create_another) ? back()->withSuccess(__('Customer created')) : redirect()->route('admin::customer.index')->withSuccess(__('Customer created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin::customer.edit', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin::customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Packages\Admin\Http\Requests\Customer\UpdateRequest  $request
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Customer $customer)
    {
        DB::transaction(function () use ($request, $customer) {
            $customer->update($request->only('name', 'email', 'mobile'));
        });

        return $request->return_to ? redirect()->route($request->return_to)->withSuccess(__('Customer updated')) : back()->withSuccess(__('Customer updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->withSuccess(__('Customer deleted'));
    }
}
