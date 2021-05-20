<?php
namespace Packages\Admin\Transformers\Datatables;

use League\Fractal;
use Packages\Admin\Models\Customer;

class CustomerTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Customer $customer)
    {
        return [
            'DT_RowId' => $customer->id,
            'id' => $customer->id,
            'can_delete' => !empty(request()->user()) && request()->user()->can('delete', $customer) && empty($customer->deleted_at),
            'can_edit' => !empty(request()->user()) && request()->user()->can('update', $customer) && empty($customer->deleted_at),
            'created_at' => $customer->created_at->toW3cString(),
            'deleted_at' => empty($deleted_at = $customer->deleted_at) ? false : $deleted_at->toW3cString(),
            'delete_route' => route('admin::customer.destroy', $customer),
            'edit_route' => route('admin::customer.edit', $customer),
            'email' => $customer->email,
            'mobile' => $customer->mobile,
            'name' => $customer->name,
            'status' => empty($customer->deleted_at) ? __('Active') : __('Removed'),
        ];
    }
}
