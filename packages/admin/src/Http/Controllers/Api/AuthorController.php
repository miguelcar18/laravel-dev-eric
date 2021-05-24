<?php

namespace Packages\Admin\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;
use Illuminate\Http\Request;
use Packages\Admin\Repositories\Datatables\AuthorRepository;
use Packages\Admin\Transformers\Datatables\AuthorTransformer;


class AuthorController extends Controller
{

    protected $author;

    public function __construct(ApiResponse $response,  AuthorRepository $author)
    {
        parent::__construct($response);
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->author->paginate(true);
        return $this->response->withPaginator($authors, new AuthorTransformer, null, [
            'draw' => intval(request()->draw),
        ]);
    }

}