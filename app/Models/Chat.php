<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['from_user_id', 'to_user_id', 'chat_message', 'message_status'];


    public function chatFrom()
    {
        return $this->hasOne(User::class,'id','from_user_id');
    }

    public function chatTo()
    {
       return  $this->hasOne(User::class,'id','to_user_id');
    }

    public function scopeCountMessage($query){
        return $query->where('message_status', 'Not Send')->where('to_user_id', Auth::user()->id)->count();
    }

}

