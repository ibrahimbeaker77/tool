<?php

namespace App\Http\Controllers;

use App\Models\CompanyInformation;
use Illuminate\Http\Request;

class CompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = CompanyInformation::latest()->get();      
        return view('backend.company-information.index', compact('information'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.company-information.create');
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
            'name'   => 'required',
            'icon'   => 'required',
            'value'  => 'required',
            'link'   => 'required',
            'status' => 'required',
        ]);

        CompanyInformation::create($request->all());
       
        return redirect()->route('company-information.index')->with('success', 'Company Information Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyInformation  $companyInformation
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInformation $companyInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyInformation  $companyInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInformation $companyInformation)
    {
        return view('backend.company-information.edit', compact('companyInformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyInformation  $companyInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyInformation $companyInformation)
    {
        $request->validate([
            'name'   => 'required',
            'icon'   => 'required',
            'value'  => 'required',
            'link'   => 'required',
            'status' => 'required',
        ]);

        $companyInformation->update($request->all());
        return redirect()->route('company-information.index')->with('success', 'Company Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyInformation  $companyInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyInformation $companyInformation)
    {
        $companyInformation->delete();
        return redirect()->route('company-information.index')->with('success', 'Company Information Deleted Successfully');
    }
}
