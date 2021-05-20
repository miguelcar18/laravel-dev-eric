<?php

namespace Packages\Admin\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;
use Illuminate\Http\Request;
use Packages\Admin\Http\Controllers\Api\Controller;
use Packages\Admin\Repositories\Datatables\CustomerRepository;
use Packages\Admin\Transformers\Datatables\CustomerTransformer;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(ApiResponse $response, CustomerRepository $customer)
    {
        parent::__construct($response);
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer->paginate(true);
        return $this->response->withPaginator($customers, new CustomerTransformer, null, [
            'draw' => intval(request()->draw),
        ]);
    }
}
