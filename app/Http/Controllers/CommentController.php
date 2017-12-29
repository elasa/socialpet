<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Comment;
use App\Publication;

class CommentController extends Controller
{
    

    public function index()
    {
        
        

        // return view('comment.index',compact('comments'));   
    }


    public function store(Request $request)
    {

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->publication_id = $request->post('id');
        $comment->message = $request->post('message');
        $comment->commented = date('Y-m-d H:i:s');
        $comment->save();

        return redirect()->back();
    }

    public function show($comments)
    {
        
        $user_id = Auth::id();
        $publication_id = $comments;

        $publication = User::where('publications.id',$publication_id)
            ->join('walls','walls.user_id','=','users.id')
            ->join('publications','publications.wall_id','=','walls.id')
            ->select('users.name','users.avatar','publications.id','publications.message','publications.created_at')
            ->first();

        /*select `users`.`id`, `users`.`name`,`publications`.`message` from `users` inner join `walls` on `walls`.`user_id` = `users`.`id` inner join `publications` on `publications`.`wall_id` = walls.id*/

        $comments = User::orderBy('comments.id','ASC')->where('publication_id',$publication_id)
            ->join('comments', 'comments.user_id', '=', 'users.id')
            ->join('publications', 'publications.id', '=', 'comments.publication_id')
            ->select('users.id','users.name','users.avatar','comments.id','comments.user_id','comments.message', 'comments.created_at')
            ->paginate(10);

            /*
            select `users`.`id`, `users`.`name`,`comments`.`message` from `users` inner join `comments` on `comments`.`user_id` = `users`.`id` inner join `publications` on `publications`.`id` = `comments`.`publication_id`
            */  

        $count_comments = $comments->count();

        return view('comment.index',compact('publication','comments','count_comments','user_id'));

    }


    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();        
    }
}
