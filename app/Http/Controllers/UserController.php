<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web');
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
}
