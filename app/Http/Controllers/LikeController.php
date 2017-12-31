<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
	public function like($user,$publication)
	{
		$like = new Like;

		$like->user_id = $user;
		$like->publication_id = $publication;
		$like->save();

		return redirect('/');
	}


}
