<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;


class ChatController extends Controller
{

    public function index()
    {
        return view('ChatPage.ChatPage');
    }
    public function rooms()
    {
        return ChatRoom::all();
    }

    public function messages($roomId)
    {
        return ChatMessage::where('chat_room_id', $roomId)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function newMessage(Request $request, $roomId)
    {
        $newMessage = new ChatMessage;
        $newMessage->chat_room_id = $roomId;
        $newMessage->user_id = Auth::id();
        $newMessage->message = $request->message;
        $newMessage->save();

        return $newMessage;
    }

    public function updateChatHistory(Request $request)
    {
        // Proses untuk menyimpan pesan ke database
        $message = $request->input('message');

        // Ambil ID chat room dari request, jika diperlukan
        $roomId = $request->input('room_id');

        // Kirim pesan ke Pusher
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true,
            ]
        );

        // Trigger event 'new-message' pada channel 'chat-room-{roomId}'
        $pusher->trigger('chat-room-' . $roomId, 'new-message', ['message' => $message]);

        return response()->json(['status' => 'success']);
    }
    //
}
