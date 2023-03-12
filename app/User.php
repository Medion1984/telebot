<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'phone', 'status', 'is_admin'
    ];

    protected $hidden = [
        'password'
    ];

    public function generatePassword($password)
    {
        if($password != null){
            $this->password = bcrypt($password);
            $this->save();
        }
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
