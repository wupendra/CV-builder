<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Theme;
use App\User;
use App\Award;
use App\Education;
use App\Interest;
use App\Language;
use App\Location;
use App\Profile;
use App\Publication;
use App\Reference;
use App\Skill;
use App\Volunteer;
use App\Work;
use Auth;
use PDF;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web')->except('viewProfile');
    }

    public function index()
    {
    	$user = Auth::guard('web')->user();
        $work = new Work;
        $profile = new Profile;
        $education = new Education;
        $skill = new Skill;
        $award = new Skill;
        $language = new Language;
        $volunteer = new Volunteer;
        $interest = new Interest;
        $publication = new Publication;
        $reference = new Reference;
    	return view('frontend.user.dashboard',compact('user','work','profile','education','skill','award','language','volunteer','interest','publication','reference'));
    }

    public function userSettings()
    {
        $user = auth()->guard('web')->user();
        return view('frontend.user.user-setting',compact('user'));
    }

    public function storeUserSettings(Request $request)
    {
        //because of the social login user do not have username and also may not have email so if they don't we need to tell them to submit the username and email fields to make their profile visible.
        $user = auth()->guard('web')->user();
        $rules = [];
        if(empty($user->username))
            $rules['username']= 'required|string|max:100|regex:/^[a-zA-Z0-9-_]+$/|unique:users';
        if(empty($user->email))
            $rules['email'] = 'required|string|email|max:255|unique:users';

        $request->validate(($rules));
        if($request->has('email'))
            $user->email = $request->get('email');

        if($request->has('username'))
            $user->username = $request->get('username');

        if($request->has('profile_visibility'))
            $user->visibility = 1;
        else
            $user->visibility = 0;

        $user->save();
        return redirect()->back()->with('success-msg','Your settings has been saved.');
    }

    public function viewProfile($username)
    {
        //can't use scope since we want to load to different views for the private profile
        $user = User::whereUsername($username)->firstOrFail();

        //check if the profile belongs to the authenticated user
        if($user->visibility || (auth()->guard('web')->check() && auth()->guard('web')->user()->id==$user->id))
            return view('frontend.user.profile',compact('user'));
        else
            return view('frontend.user.private-cv',compact('user'));

    }

    public function postChangePassword(Request $request)
    {
        //because of the social login user do not have password so if they don't we need to tell them to submit the form without providing old password
        $user = auth()->guard('web')->user();
        $rules = [
                    'password' => ['required', 'string', 'min:8', 'confirmed']
                ];
        if(empty($user->username))
            $rules['old_password']= 'required';
        $request->validate(($rules));
        if(empty($user->password))
        {
            $user->password = Hash::make($request->get('password'));
        }
        else
        {
            if($user->password === Hash::make($request->get('old_password')))
            {
                $user->password = Hash::make($request->get('password'));
            }
            else
                return redirect()->back()->with('error-msg','Sorry your old password is not correct.');
        }
        $user->save();
        return redirect()->back()->with('success-msg','Your password has been changed.');
    }

}
