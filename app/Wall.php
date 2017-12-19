<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{

    public function user(){

    	return $this->belonsTo(User::class);
    }

    public function publications(){

    	return $this->hasMany(Publication::class);
    }

    public static function comments_count($id=0){

        return Comment::where('publication_id',$id)->get()->count();
    }
}
