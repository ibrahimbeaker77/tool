<?php

namespace App\Http\Controllers;

use App\Models\SocialLinks;
use Illuminate\Http\Request;

class SocialLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialLinks = SocialLinks::latest()->get();      
        return view('backend.social-links.index', compact('socialLinks'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.social-links.create');
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
            'name'   => 'required|unique:social_links,name',
            'icon'   => 'required',
            'link'   => 'required',
            'status' => 'required',
        ]);

        SocialLinks::create($request->all());
       
        return redirect()->route('social-links.index')->with('success', 'Social Link Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialLinks  $socialLinks
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLinks $socialLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLinks  $socialLinks
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLinks $socialLink)
    {
        return view('backend.social-links.edit', compact('socialLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLinks  $socialLinks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLinks $socialLink)
    {
        $request->validate([
            'name'   => 'required',
            'icon'   => 'required',
            'link'   => 'required',
            'status' => 'required',
        ]);

        $socialLink->update($request->all());
        return redirect()->route('social-links.index')->with('success', 'Social Link Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLinks  $socialLinks
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLinks $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('social-links.index')->with('success', 'Social Link Deleted Successfully');
    }
}
