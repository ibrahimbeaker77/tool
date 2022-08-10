<?php

namespace App\Http\Controllers;

use App\Models\ToolCategories;
use Illuminate\Http\Request;

class ToolCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = ToolCategories::latest()->get();
        return view('backend.tools.category.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = ToolCategories::latest()->get();
        return view('backend.tools.category.create');
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
            'title'       => 'required|unique:tool_categories,title',
            'slug'        => 'required|unique:tool_categories,slug',
            'status'      => 'required',
            'description' => 'required',
        ]);

        ToolCategories::create($request->all());
        return redirect()->route('tools-category.index')->with('success', 'Tool Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolCategories  $toolCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ToolCategories $toolCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolCategories  $toolCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(ToolCategories $category , $id)
    {
        $category = ToolCategories::findOrFail($id);
        return view('backend.tools.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToolCategories  $toolCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToolCategories $toolCategory , $id)
    {
        $toolCategory = ToolCategories::findOrFail($id);
        $data         = $request->all();
        $request->validate([
            'title'       => 'required',
            'status'      => 'required',
            'slug'        => 'required',
            'description' => 'required',
        ]);

        $toolCategory->update($data);
        return redirect()->route('tools-category.index')->with('success', 'Tool Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolCategories  $toolCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToolCategories $category, $id)
    {
        $category->destroy($id);
        return redirect()->route('tools-category.index')->with('success', 'Category Deleted Successfully');
    }
}
