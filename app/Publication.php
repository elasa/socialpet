<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{

	protected $fillable = [
        'wall_id', 'message','published',
    ];

    public function getCreatedAtAttribute($date){

    	return new Date($date);
    }
    
    public function getUpdatedAtAttribute($date){

    	return new Date($date);
    }

    public function walls(){

    	return $this->belongsTo(Wall::class);
    }
}
