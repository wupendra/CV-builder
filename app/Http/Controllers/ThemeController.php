<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Auth;
use App\User;

class ThemeController extends Controller
{
	public function __construct()
    {
        //$this->middleware('auth:web')->only(['userThemePreview']);
    }

    public function index()
    {
    	$themes = Theme::active(1)->latest()->paginate(9);
    	return view('frontend.theme.index',compact('themes'));
    }

    public function themePreview(Theme $theme)
    {
        if(auth()->guard('web')->check())
            $user = Auth::guard('web')->user();
        else
            $user = User::findOrFail(2);
        if(view()->exists('frontend.theme.themes.'.$theme->slug))
            return view('frontend.theme.themes.'.$theme->slug,compact('user'));
        else redirect()->back()->with('info-msg','Sorry the theme is currently unavailable at the moment.');
    }
}
