<?php

namespace Packages\News\Http\Controllers;

use Illuminate\Http\Request;
use Packages\News\Events\ArticleEvent;
use Packages\News\Http\Requests\Article\StoreRequest;
use Packages\News\Http\Requests\Article\UpdateRequest;
use Packages\News\Models\Article;
use Packages\News\Models\Author;
use Packages\News\Traits\Notification;

class ArticlesController extends Controller
{
    use Notification;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy('created_at', 'DESC')->paginate(8);
//        dd($article);
        return view('news::articles.index')->with('articles', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        return view('news::articles.create')->with('authors', $authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $article = new Article($request->all());
//        dd($article);
        $article->save();

//        event(new ArticleEvent());
        $this->mailNotify($article);

        return redirect()->route('news_articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $author = Author::findOrFail($article->author_id);
//        dd($article,$author);
        return view('news::articles.show')
            ->with([
                'article' => $article,
                'author' => $author
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $authors = Author::all();

        return view('news::articles.edit')
            ->with('article', $article)
            ->with('authors', $authors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->section = $request->section;
        $article->author_id = $request->author_id;
        $article->body = $request->body;
        $article->update();

        return redirect()->route('news_articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();

        return redirect()->route('news_articles');
    }
}
