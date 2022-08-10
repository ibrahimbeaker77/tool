<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::latest()->get();
        return view('backend.pages.index', compact('pages'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create');
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
            'name'        => 'required|unique:pages,name',
            'slug'        => 'required|unique:pages,slug',
            'status'      => 'required',
            'feature'     => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]); 

        if ($request->hasFile('feature'))
        {
            $data['feature'] = date('d_m_y').'_'.time().'_'.$request->feature->getClientOriginalName();
            $request->feature->move(public_path('/assets/images/media/files'), $data['feature']);
        }

        Pages::create($data);
        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Pages $page)
    {
        return view('backend.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pages $page)
    {
        $data = $request->all();
        $request->validate([
            'name'        => 'required',
            'slug'        => 'required',
            'status'      => 'required',
            'feature'     => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('feature'))
        {
            $data['feature'] = date('d_m_y').'_'.time().'_'.$request->feature->getClientOriginalName();
            $request->feature->move(public_path('/assets/images/media/files'), $data['feature']);
        }

        $page->update($data);
        return redirect()->route('pages.index')->with('success', 'Page Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page Deleted Successfully');
    }
}
