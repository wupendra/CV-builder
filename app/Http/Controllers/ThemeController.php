<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Auth;

class ThemeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web')->only(['themePreview']);
    }

    public function index()
    {
    	$themes = Theme::active(1)->latest()->paginate(9);
    	return view('frontend.theme.index',compact('themes'));
    }

    public function themePreview(Theme $theme)
    {
    	$user = Auth::guard('web')->user();
    	if(view()->exists('frontend.theme.themes.'.$theme->slug))
    		return view('frontend.theme.themes.'.$theme->slug,compact('user'));
    	else redirect()->back()->with('info-msg','Sorry the theme is currently unavailable at the moment.');
    }
}
