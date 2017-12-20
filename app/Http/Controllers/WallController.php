<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wall;
use App\Publication;
use App\Comment;

class WallController extends Controller
{
    public function index(){

    	$user = Auth::user()->name;
        $avatar = Auth::user()->avatar;
        $pets = Auth::user()->pets;

    	$id = Wall::select('id')->where('user_id',Auth::id())->get();
    	$publications = Publication::orderBy('id','DESC')->where('wall_id',$id[0]->id)->get();

    	//$public_post = Publication::orderBy('id','DESC')->where('wall_id','<>',$id[0]->id)->where('is_public','SI')->get();

    	$user_names = User::join('walls', 'users.id', '=', 'walls.user_id')
            ->join('publications', 'walls.id', '=', 'publications.wall_id')
            ->select('users.id','users.name','users.avatar','publications.wall_id')
            ->get();


    	return view('wall.index', compact('user','avatar','publications', 'public_post','user_names','comments_count','pets'));

    }

    public function publication($id){

        Publication::where('id', $id)
            ->update(['is_public' => 'SI']);

        return redirect('/');
    }

    

}
