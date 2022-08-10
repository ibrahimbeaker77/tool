<?php
namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\BlogCategories;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::with('categories')->latest()->get();
        return view('backend.blogs.index', compact('blogs'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategories::latest()->get();
        return view('backend.blogs.create', compact('categories'));
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
            'title'        => 'required|unique:blogs,title',
            'slug'         => 'required|unique:blogs,slug',
            'feature'      => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'  => 'required',
            'reading_time' => 'required',
            'auth'         => 'required',
            'role'         => 'required',
            'description'  => 'required',
            'publish_time' => 'required',
        ]);

        if ($request->hasFile('feature'))
        {
            $data['feature'] = date('d_m_y').'_'.time().'_'.$request->feature->getClientOriginalName();
            $request->feature->move(public_path('/assets/images/media/blogs'), $data['feature']);
        }

        Blogs::create($data);
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blog)
    {
        $categories = BlogCategories::latest()->get();
        return view('backend.blogs.edit', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogs $blog)
    {
        $data = $request->all();
        $request->validate([
            'title'        => 'required',
            'slug'         => 'required',
            'feature'      => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'  => 'required',
            'reading_time' => 'required',
            'auth'         => 'required',
            'role'         => 'required',
            'publish_time' => 'required',
            'description'  => 'required',
        ]);

        if ($request->hasFile('feature'))
        {
            $data['feature'] = date('d_m_y').'_'.time().'_'.$request->feature->getClientOriginalName();
            $request->feature->move(public_path('/assets/images/media/blogs'), $data['feature']);
        }

        $blog->update($data);
        return redirect()->route('blogs.index')->with('success', 'Blog Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog Deleted Successfully');
    }
}
