<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersProfile extends Authenticatable {

    public function user()
    {
        return $this->hasOne('App\User', 'user_id');
    }


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_surname', 'phone', 'address', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'profile_id'
    ];
    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
}
