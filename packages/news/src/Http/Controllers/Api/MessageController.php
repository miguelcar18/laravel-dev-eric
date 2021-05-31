<?php

namespace Packages\News\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;
use Illuminate\Http\Request;
use Packages\News\Http\Controllers\Api\Controller;
use Packages\News\Repositories\Datatables\MessageRepository;
use Packages\News\Transformers\Datatables\MessageTransformer;

class MessageController extends Controller
{
    protected $message;

    public function __construct(ApiResponse $response, MessageRepository $message)
    {
        parent::__construct($response);
        $this->message = $message;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = $this->message->paginate();
        return $this->response->withPaginator($messages, new MessageTransformer, null, [
            'draw' => intval(request()->draw),
        ]);
    }
}
