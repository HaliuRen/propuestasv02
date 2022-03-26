<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(Message $message){
        return view('messages.show', compact('message'));
    }
    
    public function store(Request $request){
        $request->validate([
            'subject' => 'required|max:20',
            'body' => 'required|max:250',
            // 'to_user_id' => 'required|exists:users, id',
            'to_user_id' => 'required'
        ]);

        Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
        ]);

        return redirect()->back()->with('info', '¡Tu mensaje fue enviado!');
    }
}
