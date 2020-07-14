<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $themes = Theme::active(1)->latest()->paginate(9);
        return view('frontend.home',compact('themes'));
    }

    public function TermsNConditon()
    {
        return view('frontend.page.terms-and-condition');
    }

    public function privacyPolicy()
    {
        return view('frontend.page.privacy-policy');
    }
}
