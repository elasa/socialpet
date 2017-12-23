<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wall;
use App\Publication;
use App\Comment;

class MainController extends Controller
{
    public function index(){

        $user = Auth::user()->name;
        $avatar = Auth::user()->avatar;
        $pets = Auth::user()->pets;


        //$publications = Auth::user()->wall->publications;


        $id = Wall::select('id')->where('user_id',Auth::id())->get();
        $publications = Publication::orderBy('id','DESC')->where('wall_id',$id[0]->id)->get();

        $public_post = Publication::orderBy('id','DESC')->where('is_public','SI')->get();

        $user_names = User::join('walls', 'users.id', '=', 'walls.user_id')
            ->join('publications', 'walls.id', '=', 'publications.wall_id')
            ->select('users.id','users.name','users.email','users.avatar','publications.wall_id')
            ->get();


        return view('main', compact('user','avatar','publications', 'public_post','user_names','comments_count','pets'));

    }

    public function store(Request $request)
    {
        // $this->validate($request, [

        //     'wall_id' => 'required',
        //     'message' => 'required|string',
        //     'published' => 'required'
        // ]);
        //  $wall = [];
        $walls = new Wall;
        $wall = Wall::where('user_id', Auth::id())->get();
        $publication = new Publication;
        $publication->wall_id = $wall[0]->user_id; 
        $publication->message = $request->post('message');
        $publication->published = date('Y-m-d H:i:s');
        $publication->is_public = "SI";
        $publication->save();

        return redirect('/');
    }

}
