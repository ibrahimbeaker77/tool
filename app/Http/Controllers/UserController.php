<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '=', '2')->latest()->get();
        return view('backend.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'email' => 'required|unique:users,email',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['twoStepVerification']       = 0;
        $data['twoStepVerificationStatus'] = 0;
        $data['emailNotification']         = 1;
        $data['securityAlert']             = 1;
        $data['alwaysSignIn']              = 1;
        $data['status']                    = 1;
        $data['role']                      = 2;
        $data['membership']                = 2;
        $data['apiKeyStatus']              = 1;
        $data['password']                  = Hash::make($data['password']);
        $data['apiKey']                    = Hash::make($data['email']);

        if ($request->hasFile('image'))
        {
            $data['image'] = date('d_m_y').'_'.time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('/assets/images/users'), $data['image']);
        }

        $user = User::create($data);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('backend.users.edit', compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image'))
        {
            $data['image'] = date('d_m_y').'_'.time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('/assets/images/users'), $data['image']);
        }

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted Successfully');
    }
}
