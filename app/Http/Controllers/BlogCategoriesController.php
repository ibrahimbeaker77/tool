<?php

namespace App\Http\Controllers;

use App\Models\BlogCategories;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategories::latest()->get();
        return view('backend.blogs.category.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.category.create');
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
            'title'  => 'required|unique:blog_categories,title',
            'slug'   => 'required|unique:blog_categories,slug',
            'status' => 'required',
        ]);

        BlogCategories::create($request->all());
       
        return redirect()->route('blogs-category.index')->with('success', 'Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategories $blogCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategories $category, $id)
    {
        $category = BlogCategories::findOrFail($id);
        return view('backend.blogs.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategories $blogCategory, $id)
    {
        $blogCategory = BlogCategories::findOrFail($id);
        $data         = $request->all();
        $request->validate([
            'title'  => 'required',
            'slug'   => 'required',
            'status' => 'required',
        ]);

        $blogCategory->update($data);
        return redirect()->route('blogs-category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategories $category, $id)
    {
        $category->destroy($id);
        return redirect()->route('blogs-category.index')->with('success', 'Category Deleted Successfully');
    }
}
