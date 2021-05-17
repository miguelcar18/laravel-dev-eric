<?php

namespace Packages\News\Http\Controllers;

use Illuminate\Http\Request;
use Packages\News\Events\AuthorEvent;
use Packages\News\Http\Requests\Author\StoreRequest;
use Packages\News\Http\Requests\Author\UpdateRequest;
use Packages\News\Models\Author;
use Packages\News\Rules\Phone;
use Packages\News\Traits\Notification;

class AuthorController extends Controller
{
    use Notification;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('created_at','DESC')->paginate(8);

        return view('news::authors.index')->with('authors',$authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("news::authors.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $author = new Author($request->all());
        $author->save();

//        event(new AuthorEvent($author));
        $this->mailNotify($author);

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);

        return view('news::authors.show')->with('author',$author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
//        dd($author);

        return view('news::authors.edit')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->dni = $request->dni;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->name = $request->name;
        $author->lastName = $request->lastName;
        $author->update();

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::destroy($id);

        return redirect()->route('authors.index');
    }
}
