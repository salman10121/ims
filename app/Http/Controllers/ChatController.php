<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::latest()->get();
        return view('chat.index', compact('chats'));
    }

    public function store(Request $request)
    {
           dd($request);
        $request->validate([
            'user_message' => 'required|string',
        ]);

        $message = $request->input('user_message');
        $response = $this->generateBotResponse($message);

        $chat = Chat::create([
            'user_message' => $message,
            'bot_response' => $response,
        ]);

        // Return JSON for AJAX call
        return response()->json([
            'user_message' => $chat->user_message,
            'bot_response' => $chat->bot_response,
        ]);
    }


    private function generateBotResponse($message)
    {
        if (str_contains(strtolower($message), 'hello')) {
            return 'Hi! How can I help you today?';
        }

        return "I'm a simple bot. You said: " . $message;
    }
}
