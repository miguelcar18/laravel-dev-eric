<?php

namespace Packages\News\Http\Controllers;

use DB;
use Illuminate\Http\Request;
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
//        $authors = Author::orderBy('created_at', 'DESC')->paginate(8);

        return view('news::authors.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $author = new Author($request->all());
        $author->save();

//        event(new AuthorEvent($author));
        $this->mailNotify($author);

        return redirect()->route('news::author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        foreach ($author->notifications as $notification) {
            $author = $notification->type;
        }
//        $author->unreadNotifications()->markAsRead();
//        dd($author);

        return view('news::authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('news::authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Author $author)
    {
        $author->update([
            'dni' => $request->dni,
            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->name,
            'lastName' => $request->lastName,
        ]);

        return redirect()->route('news::author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('news::author.index');
    }

    public function notify($id)
    {
        $author = Author::find($id);

        foreach ($author->notifications as $notification) {
            $author = $notification->type;
        }

        dd($author);
    }
}
