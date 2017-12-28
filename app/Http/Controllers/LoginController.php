<?php

namespace App\Http\Controllers;

use App\SocialProvider;
use App\User;
use App\Wall;
use Socialite;

class LoginController extends Controller
{
    
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {

    	try {

    		$socialUser = Socialite::driver($provider)->user();
    		
    	} catch (Exception $e) {

    		return redirect('/');
    	}

    	//Check if we have logged provider
    	$socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();


    	if (true) {
    		
    		//create a new user and provider

    		$user = User::firstOrCreate(

    			['email' => $socialUser->getEmail()],
    			['name' => $socialUser->getName(),'avatar' => $socialUser->getAvatar()]
    		);

    		$user->socialProviders()->create(

    			['provider_id' => $socialUser->getId(), 'provider' => $provider]
    		);

    		// crea muro del usuario
    		$wall = new Wall;

    		$wall->user_id = $user->id;
    		$wall->save();
        // -----------------------

    	}
    	else{

    		$user = $socialProvider->user;

    	}

    	auth()->login($user);
        

        return redirect('/');

        // $user->token;
    }

}