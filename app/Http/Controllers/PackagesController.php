<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::latest()->get();
        return view('backend.packages.index', compact('packages'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.packages.create');
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
            'name'        => 'required|unique:packages,name',
            'recommended' => 'required',
            'type'        => 'required',
            'price'       => 'required',
            'savings'     => 'required',
            'api'         => 'required',
            'plugin'      => 'required',
            'validity'    => 'required',
            'user_seats'  => 'required',
            'status'      => 'required',
        ]);

        Packages::create($request->all());
       
        return redirect()->route('packages.index')->with('success', 'Package Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit(Packages $package)
    {
        return view('backend.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packages $package)
    {
        $request->validate([
            'name'        => 'required',
            'recommended' => 'required',
            'type'        => 'required',
            'price'       => 'required',
            'savings'     => 'required',
            'api'         => 'required',
            'plugin'      => 'required',
            'validity'    => 'required',
            'user_seats'  => 'required',
            'status'      => 'required',
        ]);

        $package->update($request->all());
        return redirect()->route('packages.index')->with('success', 'Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package Deleted Successfully');
    }
}
