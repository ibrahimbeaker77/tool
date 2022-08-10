<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertise = Advertise::latest()->get();
        return view('backend.advertise.index', compact('advertise'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.advertise.create');
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
            'f_name'      => 'required',
            'l_name'      => 'required',
            'email'       => 'required',
            'phone'       => 'required',
            'subject'     => 'required',
            'url'         => 'required',
            'description' => 'required',
            'status'      => 'required',
        ]);

        Advertise::create($request->all());
       
        return redirect()->route('advertise.index')->with('success', 'Advertise Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function show(Advertise $advertise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertise $advertise)
    {
        return view('backend.advertise.edit', compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertise $advertise)
    {
        $request->validate([
            'f_name'      => 'required',
            'l_name'      => 'required',
            'email'       => 'required',
            'phone'       => 'required',
            'subject'     => 'required',
            'url'         => 'required',
            'description' => 'required',
            'status'      => 'required',
        ]);

        $advertise->update($request->all());
        return redirect()->route('advertise.index')->with('success', 'Advertise Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertise $advertise)
    {
        $advertise->delete();
        return redirect()->route('advertise.index')->with('success', 'Advertise Deleted Successfully');
    }
}
