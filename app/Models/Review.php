<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'habitation_id', 'comment','score'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}

