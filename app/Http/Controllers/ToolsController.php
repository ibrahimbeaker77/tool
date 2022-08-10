<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\ToolCategories;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tool = Tools::latest()->get();
        return view('backend.tools.index', compact('tool'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ToolCategories::latest()->get();
        return view('backend.tools.create', compact('categories'));
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
            'title'       => 'required|unique:tools,title',
            'slug'        => 'required|unique:tools,slug',
            'status'      => 'required',
            'feature'     => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('feature'))
        {
            $data['feature'] = date('d_m_y').'_'.time().'_'.$request->feature->getClientOriginalName();
            $request->feature->move(public_path('/assets/images/tools'), $data['feature']);
        }

        Tools::create($data);
        return redirect()->route('tools.index')->with('success', 'Tool created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function show(Tools $tools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function edit(Tools $tool)
    {
        $categories = ToolCategories::latest()->get();
        return view('backend.tools.edit', compact(['tool', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tools $tool)
    {
        $data = $request->all();
        $request->validate([
            'title'       => 'required',
            'slug'        => 'required',
            'status'      => 'required',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('feature'))
        {
            $data['feature'] = date('d_m_y').'_'.time().'_'.$request->feature->getClientOriginalName();
            $request->feature->move(public_path('/assets/images/tools'), $data['feature']);
        }

        $tool->update($data);
        return redirect()->route('tools.index')->with('success', 'Tool Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tools $tool)
    {
        $tool->delete();
        return redirect()->route('tools.index')->with('success', 'Tools Deleted Successfully');
    }
}
