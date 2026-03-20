<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatAssistan extends Model
{
    protected $guarded = [];

   public function conversations(){
        return $this->hasMany(ChatConversation::class, 'assistant_id');
    }
}
