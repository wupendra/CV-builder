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

    }

    public function storeUserSettings()
    {

    }

    public function viewProfile()
    {

    }

    //download CV
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateCv(Theme $theme)
    {
        $user = Auth::guard('web')->user();
        $pdf = PDF::loadView('frontend.theme.themes.'.$theme->slug, compact('user'));
        return $pdf->stream($user->name.'.pdf');
    }
}
