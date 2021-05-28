<?php

namespace Packages\News\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;
use Illuminate\Http\Request;
use Packages\News\Http\Controllers\Api\Controller;
use Packages\News\Repositories\Datatables\ArticleRepository;
use Packages\News\Transformers\Datatables\ArticleTransformer;

class ArticleController extends Controller
{
    protected $article;

    public function __construct( ApiResponse $response, ArticleRepository $article)
    {
        parent::__construct($response);
        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->article->paginate();
        return $this->response->withPaginator($articles, new ArticleTransformer(), null, [
            'draw' => intval(request()->draw),
        ]);
    }
}
