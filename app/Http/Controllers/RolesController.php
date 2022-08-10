<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::latest()->get();
        $permissions = Permissions::latest()->get();
        return view('backend.roles.index', compact(['roles', 'permissions']))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permissions::latest()->get();
        return view('backend.roles.create', compact(['permissions']) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:roles,title',
            'permission_id' => 'required',
        ]);

        Roles::create($request->all());
       
        return redirect()->route('roles.index')->with('success', 'Role Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $role)
    {
        return view('backend.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $role)
    {
        $request->validate([
            'name'          => 'required',
            'permission_id' => 'required',
        ]);

        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role Deleted Successfully');
    }
}
