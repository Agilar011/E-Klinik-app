<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatRoom::create(['id' => 1, 'user_id_sender' => '1', 'user_id_receiver' => '2']);

        ChatRoom::create(['id' => 2, 'user_id_sender' => '2', 'user_id_receiver' => '1']);

        ChatRoom::create(['id' => 3, 'user_id_sender' => '1', 'user_id_receiver' => '3']);

        ChatRoom::create(['id' => 4, 'user_id_sender' => '3', 'user_id_receiver' => '1']);

        ChatRoom::create(['id' => 5, 'user_id_sender' => '2', 'user_id_receiver' => '3']);



        // ChatRoom::create(['name' => 'Random']);
        //
    }
}
