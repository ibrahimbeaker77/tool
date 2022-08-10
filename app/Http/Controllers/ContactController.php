<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::latest()->get();      
        return view('backend.contact.index', compact('contact'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contact.create');
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

        Contact::create($request->all());
       
        return redirect()->route('contact.index')->with('success', 'Contact Us Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('backend.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
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

        $contact->update($request->all());
        return redirect()->route('contact.index')->with('success', 'Contact Us Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact Us Deleted Successfully');
    }
}
