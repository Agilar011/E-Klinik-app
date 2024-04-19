<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = ['user_id_sender', 'user_id_receiver'];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
