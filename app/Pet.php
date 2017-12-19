<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function user(){

    	return $this->belongsTo(User::class);
    }

    public function type(){

    	return $this->belongsTo(Type::class);
    }

    protected $fillable = [
        'user_id', 'type_id', 'name', 'age','color','description','photo',
    ];

}
