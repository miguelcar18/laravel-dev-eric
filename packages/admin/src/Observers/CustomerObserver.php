<?php

namespace Packages\Admin\Observers;

use Packages\Admin\Models\Customer;
use Uuid;

class CustomerObserver
{
    public function creating(Customer $customer)
    {
        $customer->id = $customer->id ?: (string) Uuid::generate(4);
    }

    /**
     * Handle the Customer "created" event.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return void
     */
    public function created(Customer $customer)
    {
        //
    }

    public function updating(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "updated" event.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return void
     */
    public function updated(Customer $customer)
    {
        //
    }

    public function saving(Customer $customer)
    {
        //
    }

    public function saved(Customer $customer)
    {
        //
    }

    public function deleting(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return void
     */
    public function deleted(Customer $customer)
    {
        //
    }

    public function restoring(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return void
     */
    public function restored(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     *
     * @param  \Packages\Admin\Models\Customer  $customer
     * @return void
     */
    public function forceDeleted(Customer $customer)
    {
        //
    }
}
