<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LinkedSocialAccount;
use App\User;

class SocialAccountController extends Controller
{
    //
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
    	//dd(\Socialite::driver($provider)->redirect());
        return \Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
    	//dd('here');
            $user = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
        	//dd('or here');
            return redirect('/login');
        }
        $authUser = $this->findOrCreate(
            $user,
            $provider
        );

        auth()->login($authUser, true);

        return redirect()->intended(session()->pull('from','/'));
    }

    public function findOrCreate($providerUser, $provider)
    {
    	$account = LinkedSocialAccount::where('provider_name', $provider)
                   ->where('provider_id', $providerUser->getId())
                   ->first();

        if ($account) {
            return $account->user;
        } else {

        $user = User::where('email', $providerUser->getEmail())->first();

        if (! $user) {
            $user = User::create([  
                'email' => $providerUser->getEmail(),
                'name'  => $providerUser->getName(),
                'avatar'  => $providerUser->getAvatar(),
            ]);
        }
        else
        {
        	$user->avatar = $providerUser->getAvatar();
        	$user->save();
        }
        $user->accounts()->create([
            'provider_id'   => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;

        }
    }
}
