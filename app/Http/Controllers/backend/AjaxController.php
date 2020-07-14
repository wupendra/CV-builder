<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Theme;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Auth;

class AjaxController extends BaseController
{

    //Method to change status of the theme
    public function changeActiveTheme(Theme $theme)
    {
        if($theme->active)
        {
            $theme->active = 0;
            $data['changed'] = false;
        }
        else
        {
            $theme->active = 1;
            $data['changed'] = 1;
        }
        $theme->save();
        $data['log'] = true;
        return response()->json($data);
    }

     //Search Theme from its title
    public function searchThemes(Request $request)
    {
        $key = $request->get('key');
        $themes = Theme::where('name','LIKE','%'.$key.'%')->get();
        if($themes->count()>0)
            return response()->json(array('content'=>mb_convert_encoding(View::make('component.backend.theme.theme-list',compact('themes'))->render(), 'UTF-8', 'UTF-8'),'rows'=>$themes->count()));
        else
            return response()->json(array('content'=>'<tr class="products"><th colspan="6">No Data Found</th></tr>','rows'=>'0'));
    }
}
