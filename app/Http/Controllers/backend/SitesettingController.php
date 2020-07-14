<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sitesetting;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class SitesettingController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function index()
    {
        $sitesetting = Sitesetting::find(1);
        return view('backend.sitesetting.index',compact('sitesetting'));
    }

    /**
     * Update the Sitesetting.
     *
     * @param  Request  $request
     * @return Response
     */
    /*public function store(Request $request)
    {
        $this->validateRequest();
        $input = Arr::except($request->all(), array('_token'));
        //dd($input);
        $app_slug = Str::slug($input['app_name'],'-');
        if($request->hasFile('logo')){
            $file           = $request->file('logo');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/home/'.$app_slug.'-logo'.'.'.$ext)) {
                $input['logo'] = $this->checkFile($app_slug.'-logo',$ext,public_path() . '/uploads/home/');
            }
            else{
                $input['logo'] = $app_slug.'-logo'.'.'.$ext;
            }
            $file->move(public_path() . '/uploads/home/', $input['logo']);
        }
        if($request->hasFile('favicon')){
            $file           = $request->file('favicon');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/home/'.$app_slug.'-favicon.'.$ext)) {
                $input['favicon'] = $this->checkFile($app_slug.'-favicon',$ext,public_path() . '/uploads/home/');
            }
            else{
                $input['favicon'] = $app_slug.'-favicon.'.$ext;
            }
            $file->move(public_path() . '/uploads/home/', $input['favicon']);
        }
        //dd($input);
        Sitesetting::create($input);
        return redirect()->route('sitesetting.index')->with('success-msg', 'App Setting Added Successfully');
    }*/

    /**
     * Update the Sitesetting.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Sitesetting $sitesetting,Request $request)
    {
       $this->validateRequest();
        $input = Arr::except($request->all(), array('_token','_method','banner','banner_caption'));
        $app_slug = Str::slug($input['app_name'],'-');

        //upload logo of the application
        if($request->hasFile('logo')){
            if(!empty($sitesetting->logo))
            {
                if (file_exists(public_path() . '/uploads/home/'.$sitesetting->logo)) 
                {
                    $this->delete_image(public_path().'/uploads/home/'.$sitesetting->logo);
                }
            }
            $file           = $request->file('logo');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/home/'.$app_slug.'-logo'.'.'.$ext)) 
            {
                $input['logo'] = $this->checkFile($app_slug.'-logo',$ext,public_path() . '/uploads/home/');
            }
            else{
                $input['logo'] = $app_slug.'-logo'.'.'.$ext;
            }
            $file->move(public_path() . '/uploads/home/', $input['logo']);
        }

        //upload favicon for the application
        if($request->hasFile('favicon'))
        {
            if(!empty($sitesetting->favicon))
            {
                if (file_exists(public_path() . '/uploads/home/'.$sitesetting->favicon)) {
                    $this->delete_image(public_path().'/uploads/home/'.$sitesetting->favicon);
                }
            }
            $file           = $request->file('favicon');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/home/'.$app_slug.'-favicon.'.$ext)) 
            {
                $input['favicon'] = $this->checkFile($app_slug.'-favicon',$ext,public_path() . '/uploads/home/');
            }
            else
            {
                $input['favicon'] = $app_slug.'-favicon.'.$ext;
            }
            $file->move(public_path() . '/uploads/home/', $input['favicon']);
        }

        //upload banner for the application
        if($request->hasFile('banner'))
        {
            if(isset($sitesetting->options['banner']) && !empty($sitesetting->options['banner']))
            {
                if (file_exists(public_path() . '/uploads/home/'.$sitesetting->options['banner'])) {
                    $this->delete_image(public_path().'/uploads/home/'.$sitesetting->options['banner']);
                }
            }
            $input['options']['banner'] = array();
            $file           = $request->file('banner');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/home/'.$app_slug.'-banner.'.$ext)) 
            {
                $input['options']['banner'] = $this->checkFile($app_slug.'-banner',$ext,public_path() . '/uploads/home/');
            }
            else
            {
                $input['options']['banner'] = $app_slug.'-banner.'.$ext;
            }
            $file->move(public_path() . '/uploads/home/', $input['options']['banner']);
        }
        elseif(isset($sitesetting->options['banner']))
            $input['options']['banner'] = $sitesetting->options['banner'];
        $input['options']['banner_caption'] = $request->get('banner_caption');
        $sitesetting->update($input);
        return redirect()->back()->with('success-msg', 'App Setting Updated Successfully');
    }

    public function validateRequest()
    {
        return request()->validate([
            'app_name'=>'required|min:3',
            'meta_keyword'=>'required|min:3',
            'meta_title'=>'required|min:3',
            'meta_description'=>'required|min:3|max:158',
            'short_note'=>'required|min:3',
            'mobile'=>'required|min:3',
            'contact'=>'required|min:3',
            'short_note'=>'required|min:3',
            'banner_caption'=>'required|min:30',
            'admin_email'=>'required|email|min:3'
        ]);
    }
}
