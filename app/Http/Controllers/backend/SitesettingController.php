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
        $input = Arr::except($request->all(), array('_token','_method'));
        $app_slug = Str::slug($input['app_name'],'-');
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
        $sitesetting->update($input);
        return redirect()->back()->with('success-msg', 'App Setting Updated Successfully');
    }

    public function validateRequest()
    {
        return request()->validate([
            'app_name'=>'required|min:3',
            'meta_keyword'=>'required|min:3',
            'meta_title'=>'required|min:3',
            'meta_description'=>'required|min:120|max:158',
            'short_note'=>'required|min:3',
            'mobile'=>'required|min:3',
            'contact'=>'required|min:3',
            'short_note'=>'required|min:3',
            'admin_email'=>'required|email|min:3'
        ]);
    }
}
