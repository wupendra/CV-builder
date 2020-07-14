<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Theme;
use Illuminate\Support\Arr;

class ThemeController extends BaseController
{
    public function __construct()
    {
        $this->middleware('superAdmin')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::paginate(50);
        return view('backend.theme.index',compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = new Theme;
        return view('backend.theme.create',compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest();
        //dd('here');
        //dd($request->all());  
        $input = Arr::except($request->all(), array('_token'));
        $input ['slug'] = $this->checkSlug($input['name'],'Theme');

        //checking if an Article Image is present for the slug name if so making an unique file name
        if($request->hasFile('image')){
            $file           = $request->file('image');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/theme/'.$input['slug'].'.'.$ext)) {
                $input['image'] = $this->checkFile($input['slug'],$ext,public_path() . '/uploads/theme/');
            }
            else{
                $input['image'] = $input['slug'].'.'.$ext;
            }
            $file->move(public_path() . '/uploads/theme/', $input['image']);
        }
        $theme = Theme::create($input);
        return redirect()->route('theme.edit',$theme->slug)->with('success-msg','The Theme has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return view('backend.theme.show',compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('backend.theme.edit',compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $this->validateRequest();
        $input = Arr::except($request->all(), array('_token','edit_page'));
        //dd($request->all());

        //checking if an Theme Image is present for the slug name if so making an unique file name
        if($request->hasFile('image')){
            $file           = $request->file('image');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/theme/'.$input['slug'].'.'.$ext)) {
                $input['image'] = $this->checkFile($input['slug'],$ext,public_path() . '/uploads/theme/');
            }
            else{
                $input['image'] = $input['slug'].'.'.$ext;
            }
            $file->move(public_path() . '/uploads/theme/', $input['image']);
            if(!empty($theme->image)){
                if (file_exists(public_path() . '/uploads/theme/'.$theme->image)) {
                    unlink(public_path().'/uploads/theme/'.$theme->image);
                }
            }
        }
        $theme->update($input);

        return redirect()->route('theme.edit',$theme->slug)->with('success-msg','The Theme has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('theme.index')->with('warning-msg','The Theme has been deleted Successfully.');
    }

    public function validateRequest()
    {
        return request()->validate([
            'name'=>'required|min:3',
            'meta_keyword'=>'required|min:3',
            'meta_title'=>'required|min:3',
            'meta_description'=>'required|max:158',
            'credit'=>'required|min:3',
            'active'=>'required|boolean',
            'image'=>'required_without:edit_page|image|mimes:jpeg,bmp,png'
        ]);
    }
}
