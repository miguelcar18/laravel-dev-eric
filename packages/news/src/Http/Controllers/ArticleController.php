<?php

namespace Packages\News\Http\Controllers;

use Illuminate\Http\Request;
use Packages\News\Http\Requests\Article\StoreRequest;
use Packages\News\Http\Requests\Article\UpdateRequest;
use Packages\News\Models\Article;
use Packages\News\Models\Author;
use Packages\News\Traits\Notification;

class ArticleController extends Controller
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

        return redirect()->route('news::article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = Article::findOrFail($id);
        $author = Author::findOrFail($article->author_id);
//        dd($article,$author);
        return view('news::articles.show', compact('article', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $authors = Author::all();
        return view('news::articles.edit', compact('article', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'section' => $request->section,
            'author_id' => $request->author_id,
            'body' => $request->body,
        ]);

        return redirect()->route('news::article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('news::news_articles');
    }
}