<?php

namespace App\Http\Controllers;

use App\Models\subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = subscribers::latest()->get();
        return view('backend.subscribers.index', compact( ['subscribers'] ))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::latest()->get();
        return view('backend.subscribers.create', compact(['users']));
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
            'email'  => 'required|unique:subscribers,email',
            'status' => 'required',
        ]);

        subscribers::create($request->all());
       
        return redirect()->route('subscribers.index')->with('success', 'Subscriber Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function show(subscribers $subscribers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function edit(subscribers $subscriber)
    {
        $users = User::latest()->get();
        return view('backend.subscribers.edit', compact(['subscriber', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscribers $subscriber)
    {
        $request->validate([
            'email'  => 'required',
            'status' => 'required',
        ]);

        $subscriber->update($request->all());      
        return redirect()->route('subscribers.index')->with('success', 'Subscriber Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscribers $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('subscribers.index')->with('success', 'Subscriber Deleted Successfully');
    }
}
