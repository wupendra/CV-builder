<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Theme;
use PDF;
use Auth;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Theme $theme)
    {
        $user = Auth::guard('web')->user();
        $pdf = PDF::loadView('frontend.theme.themes.test', compact('user'));
  
        return $pdf->stream($user->name.'.pdf');
    }
}