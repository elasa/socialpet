<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'publication_id'];

    public function user(){

    	return $this->belongsTo(User::class);
    }

    public function publication(){

    	return $this->belongsTo(Publication::class);
    }

    public static function likes_count($id){

        return Like::where('publication_id',$id)->get()->count();
    }
}
