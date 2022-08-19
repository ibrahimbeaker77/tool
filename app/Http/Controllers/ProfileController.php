<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CompanyInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyInformation = CompanyInformation::latest()->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view('/backend.profile', compact(
            [
                'companyInformation',
                'user'
            ]
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(isset($request->password)){
            $pass = User::find($id);
            $pass->password = Hash::make($request->password);
            $save = $pass->save();
        }
        if(isset($request->name) || isset($request->email) || isset($request->phone) || isset($request->company) || isset($request->website) || isset($request->about)){
            $info = User::find($id);
            $info->name = $request->name;
            $info->email = $request->email;
            $info->phone = $request->phone;
            $info->company = $request->company;
            $info->website = $request->website;
            $info->about = $request->about;
            $save = $info->save();
        }
        if(isset($request->image))
        {
            $img = User::find($id);
                // for images update
            if ($request->hasFile('image')) {

                if(isset($img) && $img->image){
                    $preImage = public_path('/assets/images/users/'.$img->image);
                    if (File::exists($preImage)) { // unlink or remove previous image from folder
                        unlink($preImage);
                    }
                }
                $getImage = date('d_m_y').'_'.time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('/assets/images/users/'), $getImage);
                $image = $getImage;
            }   
            else{
                if (isset($img) && $img->image){
                    $image = $img->image;
                }
                else{
                    $image='';
                }
            }
            $img->image = $image;
                $save = $img->save();
        }
        if (isset($save)){
            return redirect()->back()->with('success', 'Password Updated Successfully.');
        }else{
            return redirect()->back();
        }
    }

    public function passupdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
