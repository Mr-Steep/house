<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'description',
        'id_type_habitation',
        'id_part_type_habitation',
        'latitude',
        'longitude',
        'city',
        'street',
        'house',
        'floor',
        'count_guests',
        'ids_advantages',
        'ids_photo',
        'name',
        'description',
        'price',
        'finished',
        'question',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }


    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function type_habitations()
    {
        return $this->hasOne(TypeHabitation::class,'id','id_type_habitation');
    }

    public function type_part_habitations()
    {
        return $this->hasOne(TypePartHabitation::class, 'id','id_part_type_habitation');
    }


    public function advantages()
    {
       return  Advantages::whereIn('id',explode(',',$this->ids_advantages))->get();
    }

    static function occupancy(int $id){
        $habitation = Habitation::find($id);
        $count = 0;
        return $count;
    }
}
