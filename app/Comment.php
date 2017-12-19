<?php

namespace App;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = [
        'user_id', 'publication_id','message','commented',
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
    
	public function user(){

		return $this->belongsTo(User::class);
	}

    public function publication(){

    	return $this->belongsTo(Publication::class);
    }

}
