<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCreatedAtAttribute($date){

        return new Date($date);
    }
    
    public function getUpdatedAtAttribute($date){

        return new Date($date);
    }

    public function role(){

        return $this->belongsTo(Role::class);
    }

    public function wall(){

        return $this->hasOne(Wall::class);
    }

    public function publications(){

        return $this->hasMany(Publication::class);
    }

    public function comment(){

        return $this->hasMany(Comment::class);
    }
}
