<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Like;

class LikeController extends Controller
{
	public function like($publication, Request $request)
	{

		$like = new Like;

		$likes_count = Like::likes_count($publication);

		$has_like = Like::did_you_like_it(Auth::user()->id,$publication);

		if($has_like != null){

			if($has_like->like == 0){

				$like->where('user_id', Auth::user()->id)
					->where('publication_id', $publication)
					->where('like',0)
					->update(['like' => 1]);

				if($request->json()){

					return response()->json([

						'token' => 0, // le gusta 
						'publication_id' => $publication
					]);
				}
			}

			if($has_like->like == 1){

				$like->where('user_id', Auth::user()->id)
					->where('publication_id', $publication)
					->where('like',1)
					->update(['like' => 0]);

				if($request->json()){

					return response()->json([

						'token' => 1, // ya no le gusta
						'publication_id' => $publication
					]);
				}
			}
		}
		else{
			
			$likes_count = 1;
			$like->user_id = Auth::user()->id;
			$like->publication_id = $publication;
			$like->like = 1;
			$like->save();

			if($request->json()){

				return response()->json([

					'token' => 0, // le gusta 
					'publication_id' => $like->publication_id
				]);
			}
		}
	}
}
