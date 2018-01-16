<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{

	protected $fillable = [
        'wall_id', 'message','img_post','published','like',
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

    public function likes(){
        
        return $this->hasMany(Like::class);
    }

    public static function likes_count($id){

        return Publication::select('like')->where('id',$id)->get();
    }
}
