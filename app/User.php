<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
    public static function generatePassword($password)
    {
        if($password != null){
            return bcrypt($password);
        }
        return false;
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
