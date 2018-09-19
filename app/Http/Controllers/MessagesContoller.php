<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageModel;

class MessagesContoller extends Controller
{
  public function submit(Request $request) {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required'
    ]);

    $message = new MessageModel;
    $message->name = $request->input('name');
    $message->mail = $request->input('email');
    $message->message = $request->input('message');

    $message->save();

    return redirect('/')->with('success', 'Message Sent');
  }

  public function getMessages(){
    $messages = MessageModel::all();

    return view('messages')->with('messages', $messages);
  }
}
