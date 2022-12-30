<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Events\ChatEventObject;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $sender = $request->get("sender", "Anonymous");
        $message = $request->get("message");

        ChatEvent::dispatch(new ChatEventObject($sender, $message));
    }
}
