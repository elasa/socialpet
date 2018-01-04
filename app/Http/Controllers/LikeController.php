<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikeController extends Controller
{
	public function like($publication, Request $request)
	{


		$like = new Like;
		$like->user_id = Auth::user()->id;
		$like->publication_id = $publication;
		$like->save();
		$likes_count = $like->likes_count($publication);

		if($request->json()){

			return response()->json([

				'likes' => $likes_count
			]);
		}
	}


}
