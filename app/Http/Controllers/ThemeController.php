<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Auth;
use App\User;
use PDF;

class ThemeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web')->only(['selectTheme','postSelectTheme']);
    }

    public function index()
    {
    	$themes = Theme::active(1)->latest()->paginate(9);
    	return view('frontend.theme.index',compact('themes'));
    }

    public function themePreview(Theme $theme)
    {
        //Check if user is authenticated and if the user is not load dummy data
        if(auth()->guard('web')->check())
            $user = Auth::guard('web')->user();
        else
            $user = User::findOrFail(2);
        if(view()->exists('frontend.theme.themes.'.$theme->slug))
            return view('frontend.theme.themes.'.$theme->slug,compact('user'));
        else redirect()->back()->with('info-msg','Sorry the theme is currently unavailable at the moment.');
    }
    public function selectTheme()
    {
        $themes = Theme::active(1)->latest()->paginate(9);
        return view('frontend.theme.theme-selection',compact('themes'));
    }

    public function postSelectTheme(Request $request)
    {
        $theme = Theme::whereSlug($request->theme)->first();
        $user = Auth::guard('web')->user();
        if(!empty($theme))
        {
            $pdf = PDF::loadView('frontend.theme.themes.'.$theme->slug, compact('user'));
        
            return $pdf->download($user->name.'.pdf');
        }
        else
            return redirect()->back()->with('error-msg','Theme not Found.');
    }
}
