<?php

namespace Packages\System\Http\Controllers;

use Packages\System\Models\SystemArticle;
use Illuminate\Http\Request;

class SystemArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $article = SystemArticle::orderBy('id','DESC')->paginate(10);
        $article = SystemArticle::orderBy('id','DESC')->paginate(10);

        return view('test::articles.index')->with('articles',$article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test::articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $article = new SystemArticle;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->author = $request->author;
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = SystemArticle::findOrFail($id);

        return view('test::articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = SystemArticle::findOrFail($id);
//        dd($article);
        return view('test::articles.edit')->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = SystemArticle::findOrFail($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->author = $request->author;
        $article->update();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemArticle $article)
    {

    }
}
