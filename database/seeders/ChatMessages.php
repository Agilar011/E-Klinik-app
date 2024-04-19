<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChatMessage;

class ChatMessages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ChatMessage::create(['id' => 1, 'chat_room_id' => '1', 'user_id' => '1', 'message' => 'test sender']);

        // ChatMessage::create(['id' => 2, 'chat_room_id' => '1', 'user_id' => '2', 'message' => 'test receiver']);

        ChatMessage::create(['id' => 3, 'chat_room_id' => '2', 'user_id' => '2', 'message' => 'test sender']);

        ChatMessage::create(['id' => 4, 'chat_room_id' => '2', 'user_id' => '1', 'message' => 'test receiver']);

        ChatMessage::create(['id' => 5, 'chat_room_id' => '3', 'user_id' => '1', 'message' => 'test sender']);

        ChatMessage::create(['id' => 6, 'chat_room_id' => '3', 'user_id' => '3', 'message' => 'test receiver']);

        ChatMessage::create(['id' => 7, 'chat_room_id' => '4', 'user_id' => '3', 'message' => 'test sender']);

        ChatMessage::create(['id' => 8, 'chat_room_id' => '4', 'user_id' => '1', 'message' => 'test receiver']);

        ChatMessage::create(['id' => 9, 'chat_room_id' => '5', 'user_id' => '2', 'message' => 'test sender']);

        ChatMessage::create(['id' => 10, 'chat_room_id' => '5', 'user_id' => '3', 'message' => 'test receiver']);




        //
    }
}
