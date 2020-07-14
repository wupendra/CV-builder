<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;

class AdminController extends BaseController
{
    public function __construct()
    {
        //$this->middleware('hhffsuperadmin')->except('adminDashboard');
        $this->middleware('superAdmin')->except(['editProfile','adminDashboard','postEditProfile','viewProfile']);
    }

    public function index()
    {
        $admins = Admin::get();
        return view('backend.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new Admin;
        return view('backend.admin.create',compact('admin'));
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
        $input = Arr::except($request->all(), array('_token'));
        $admin = new Admin;
        if(!empty($input['password']))
            $admin->password = bcrypt($input['password']);
        $admin->name = $input['name'];
        $admin->email = $input['email'];
        $admin->address = $input['address'];
        $admin->phone = $input['phone'];
        $admin->roles = $input['roles'];
        $admin->active = $input['active'];
        if($request->hasFile('avatar')){
            $admin->avatar = Str::slug($input['name']);
            $file           = $request->file('avatar');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/avatars/'.$admin->avatar.'.'.$ext)) {
                $admin->avatar = $this->imageName($admin->avatar,$ext,public_path() . '/uploads/avatars/');
            }
            else{
                $admin->avatar = $admin->avatar.'.'.$ext;
            }
            $file->move(public_path() . '/uploads/avatars/', $admin->avatar);
        }
        $admin->save();
        //checking if an Article Image is present for the slug name if so making an unique file name
        return redirect()->route('admin.edit',$admin->id)->with('success-msg', 'Admin Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
       return view('backend.admin.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('backend.admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //dd($request);
        $this->validateRequest();
        $input = $request->all();
        if(!empty($input['password']))
            $admin->password = bcrypt($input['password']);
        $admin->name = $input['name'];
        $admin->email = $input['email'];
        $admin->address = $input['address'];
        $admin->phone = $input['phone'];
        $admin->roles = $input['roles'];
        $admin->active = $input['active'];

        //checking if an Article Image is present for the slug name if so making an unique file name
        if($request->hasFile('avatar')){
            $admin->avatar = Str::slug($input['name']);
            $file           = $request->file('avatar');
            $ext =$file->getClientOriginalExtension();
            if (file_exists(public_path() . '/uploads/avatars/'.$admin->avatar.'.'.$ext)) {
                $admin->avatar = $this->imageName($admin->avatar,$ext,public_path() . '/uploads/avatars/');
            }
            else{
                $admin->avatar = $admin->avatar.'.'.$ext;
            }
            $file->move(public_path() . '/uploads/avatars/', $admin->avatar);
        }
        //dd($admin);
        $admin->save();
        return redirect()->route('admin.edit',$admin->id)->with('success-msg', 'Admin Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if($admin->hasRole('SUPERADMIN'))
            return redirect()->route('admin.index')->with('error-msg', 'Cannot Delete Super admin.');
        if($admin->reviews()->exists() || $admin->reviews()->exists())
            return redirect()->route('admin.index')->with('error-msg', 'Cannot Delete Admin who has reviews/articles.');
        if(!empty($admin->avatar) and file_exists(public_path() . '/uploads/avatars/'.$admin->avatar))
            $this->delete_image(public_path() . '/uploads/avatars/'.$admin->avatar);
        $admin->delete();
        return redirect()->route('admin.index')->with('success-msg', 'Admin Deleted Successfully');
    }

    public function adminDashboard()
    {
        return view('backend.admin.dashboard');
    }

    public function validateRequest()
    {
        return request()->validate([
            'name'=>'required|min:3',
            'phone'=>'required|numeric',
            'address'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'nullable|min:6',
            'roles'=>'required',
            'active'=>'required|boolean',
            'avatar'=>'nullable|image'
        ]);
    }

    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('backend.admin.edit-profile',compact('admin'));
    }

    public function postEditProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => [
                'required',
                Rule::unique('admins')->ignore($admin),
            ],
            'name'=>'required|min:3',
            'password'=>'nullable|min:6',
            'phone'=>'required|numeric|min:1000000000|max:10000000000',
            'address'=>'required|min:3',
            'avatar'=>'nullable|image'
        ]);
        if($validator->fails()){
            return redirect()-> back()->withErrors( $validator )->withInput();
        }
        else{
            if(!empty($input['password']))
                $admin->password = bcrypt($input['password']);
            $admin->name = $input['name'];
            $admin->email = $input['email'];
            $admin->address = $input['address'];
            $admin->phone = $input['phone'];

            //checking if an Article Image is present for the slug name if so making an unique file name
            if($request->hasFile('avatar')){
                $admin->avatar = Str::slug($input['name']);
                $file           = $request->file('avatar');
                $ext =$file->getClientOriginalExtension();
                if (file_exists(public_path() . '/uploads/avatars/'.$admin->avatar.'.'.$ext)) {
                    $admin->avatar = $this->imageName($admin->avatar,$ext,public_path() . '/uploads/avatars/');
                }
                else{
                    $admin->avatar = $admin->avatar.'.'.$ext;
                }
                $file->move(public_path() . '/uploads/avatars/', $admin->avatar);
            }
            //dd($admin);
            $admin->save();
            return redirect()->route('backend.view.profile')->with('success-msg','Your Profile has been edited Successfully.');
        }
        
    }

    public function viewProfile()
    {

        return view('backend.admin.view-profile',array('admin'=>Auth::guard('admin')->user()));
    }
}
