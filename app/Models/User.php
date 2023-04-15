<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'token',
        'connection_id',
        'user_status',
        'user_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function unregisteredHabitation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->habitations()
            ->whereNot('finished', 100);
    }

    public function habitations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Habitation::class);
    }

    public function booking(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Habitation::class);
    }

    public function chatFrom(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chat::class,'from_user_id','id');
    }

    public function chatTo(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chat::class,'to_user_id','id');
    }

    public function getUnregisteredHabitation(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->unregisteredHabitation()->get();
    }

    public function getFirstUnregisteredHabitation()
    {
        return $this->unregisteredHabitation()->first();
    }


    public static function isClient(): bool
    {
        return Auth::user() ? (Auth::user())->sale : false;
    }


}
