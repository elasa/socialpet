<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wall;
use App\Publication;

class PublicationController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        //
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
        $publication->is_public = $request->post('is_public');
        $publication->save();

        return redirect('/wall');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
