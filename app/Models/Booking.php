<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    const SEPARATOR = ' - ';

    protected $fillable = [
        'id',
        'user_id',
        'habitation_id',
        'arrival',
        'departure',
        'adult',
        'children',
        'confirmed',
    ];


    function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
