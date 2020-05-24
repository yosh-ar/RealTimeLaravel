<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\SendMessage;

class ChatController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowChat(){
        return view('chat.showChat');
    }
    public function sendMessage(Request $request){
        $rules = [
            'message' => 'required',
        ];

        $request->validate($rules);
        
        broadcast( new SendMessage($request->user(), $request->message));

        return response()->json('Message broadcast');
    }
}
