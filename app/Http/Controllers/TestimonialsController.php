<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonials::latest()->get();      
        return view('backend.testimonials.index', compact('testimonials'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonials.create');
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
            'title'       => 'required',
            'image'       => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rating'      => 'required',
            'email'       => 'required',
            'subject'     => 'required',
            'designation' => 'required',
            'description' => 'required',
            'status'      => 'required',
        ]);

        if ($request->hasFile('image'))
        {
            $data['image'] = date('d_m_y').'_'.time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('/assets/images/users'), $data['image']);
        }

        Testimonials::create($data);
        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonials $testimonial)
    {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonials $testimonial)
    {
        $data = $request->all();
        $request->validate([
            'title'       => 'required',
            'image'       => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rating'      => 'required',
            'email'       => 'required',
            'subject'     => 'required',
            'designation' => 'required',
            'description' => 'required',
            'status'      => 'required',
        ]);

        if ($request->hasFile('image'))
        {
            $data['image'] = date('d_m_y').'_'.time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('/assets/images/users'), $data['image']);
        }

        $testimonial->update($data);
        return redirect()->route('testimonials.index')->with('success', 'Testimonial Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonials $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonial Deleted Successfully');
    }
}
