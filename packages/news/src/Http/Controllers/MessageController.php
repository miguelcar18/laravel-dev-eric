<?php

namespace Packages\News\Http\Controllers;

use Illuminate\Http\Request;
use Packages\News\Http\Requests\Message\StoreRequest;
use Packages\News\Http\Requests\Message\UpdateRequest;
use Packages\News\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('news::messages.index');
    }

    public function create()
    {
        return view('news::messages.create');
    }

    public  function store(StoreRequest $request)
    {
        $email = new Message($request->all());
//        dd($email);
        $email->save();

        return redirect()->route('news::message.index');
    }

    public function show (Message $message)
    {
        foreach ($message->notifications as $notification)
        {
            $message = $notification->type;
        }

        return view('news::messages.show', compact($message));
    }

    public function edit(Message $message)
    {
        return view('news::messages.edit', compact('message'));
    }

    public function update(UpdateRequest $request, Message $message)
    {
        $message->update([
            'name' => $request->name,
            'subject' => $request->subject,
            'sender_name' => $request->sender_name,
            'sender_email' => $request->sender_email,
            'footer_text' => $request->footer_text,
            'answer_to' => $request->answer_to,
            'content' => $request->content,
        ]);

        return redirect()->route('news::message.index');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('news::message.index');
    }
}
