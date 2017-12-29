<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Wall;
use App\Publication;
use App\User;

class MainController extends Controller
{
    public function index(){

        $pets = Auth::user()->pets;

        $posts = Publication::join('walls', 'walls.id', '=', 'publications.wall_id')
            ->join('users', 'users.id', '=', 'walls.user_id')
            ->select('users.id','users.name','users.avatar','publications.id','publications.message', 'publications.created_at','walls.user_id')
            ->orderBy('publications.id','DESC')->paginate(10);
        /*
            SELECT users.name, publications.id, publications.message 
            FROM publications
            INNER JOIN walls on walls.id = publications.wall_id
            INNER JOIN users on users.id = walls.user_id
            ORDER BY publications.id DESC
        */

        return view('main', compact('posts','pets'));

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

    public function destroy(Publication $publication)
    {
        $publication->delete();
        
        return redirect('/');
    }

    public function edit(Publication $publication)
    {

        return view('publication.edit', compact('publication'));
    }

    public function update(Publication $publication, Request $request)
    {
        $publication->message = $request->post('message');
        $publication->save();

        session()->flash('message','Publicación mdificada correctamente!');

        return view('publication.edit', compact('publication'));
    }



}
