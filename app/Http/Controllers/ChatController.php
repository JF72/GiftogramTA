<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
class ChatController extends Controller
{
    public function listAllUsers(Request $request){
        $request->validate([
            'requester_user_id' => 'required',
        ]);
        $requesterId = $request->input('requester_user_id');
        $users = User::where('id', '!=', $requesterId)->select('id as user_id', 'email', 'first_name', 'last_name')->get();
        return response()->json([
            'users' => $users
        ]);
    }

    public function sendMessage(Request $request){
        $request->validate([
            'sender_user_id' => 'required',
            'receiver_user_id' => 'required',
            'message' => 'required',
        ]);
        $message = Message::create([
            'sender_user_id' => $request->input('sender_user_id'),
            'receiver_user_id' => $request->input('receiver_user_id'),
            'message' => $request->input('message'),
        ]);
        return response()->json([
            'success_code' => 200,
            'success_title' => 'Message Sent',
            'success_message' => 'Message was sent successfully'
        ]);
    }
    public function viewMessages(Request $request){
        $request->validate([
            'user_id_a' => 'required',
            'user_id_b' => 'required',
        ]);
        $userIdA = $request->input('user_id_a');
        $userIdB = $request->input('user_id_b');
        $messages = Message::where(function($query) use ($userIdA, $userIdB) {
            $query->where('sender_user_id', $userIdA)->where('receiver_user_id', $userIdB);
        })->orWhere(function($query) use ($userIdA, $userIdB) {
            $query->where('sender_user_id', $userIdB)->where('receiver_user_id', $userIdA);
        })->orderBy('created_at')->get();
        return response()->json([
            'messages' => $messages->map(function($message) {
                return [
                    'message_id' => $message->id,
                    'sender_user_id' => $message->sender_user_id,
                    'message' => $message->message,
                    'epoch' => $message->created_at->timestamp,
                ];
            })
        ]);
    }
}
