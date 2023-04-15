<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePartHabitation extends Model
{
    use HasFactory;

    protected $hidden = [
        'name',
    ];
}
