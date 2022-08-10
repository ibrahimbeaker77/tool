<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\subscribers;
use App\Models\Contact;
use App\Models\Advertise;
use App\Models\Pages;
use App\Models\Faqs;
use App\Models\Blogs;
use App\Models\SocialLinks;
use App\Models\Packages;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_users          = User::count();

        $total_admin          = User::where('role', '=', '1')->count();
        $total_customers      = User::where('role', '=', '2')->count();

        $total_full_access    = User::where('membership', '=', '1')->count();
        $total_free_access    = User::where('membership', '=', '2')->count();
        $total_paid_access    = User::where('membership', '=', '3')->count();

        $total_active_users   = User::where('Status', '=', '1')->count();
        $total_inactive_users = User::where('Status', '=', '0')->count();

        $total_subscribers    = subscribers::count();
        $total_contact        = Contact::count();
        $total_advertise      = Advertise::count();
        $total_pages          = Pages::count();
        $total_faqs           = Faqs::count();
        $total_blogs          = Blogs::count();
        $total_socialLinks    = SocialLinks::count();
        $total_packages       = Packages::count();

        return view('/backend.dashboard', compact(
            [
                'total_users',
                'total_admin',
                'total_customers',
                'total_full_access',
                'total_free_access',
                'total_paid_access',
                'total_active_users',
                'total_inactive_users',
                'total_subscribers',
                'total_contact',
                'total_advertise',
                'total_pages',
                'total_faqs',
                'total_blogs',
                'total_socialLinks',
                'total_packages'
            ]
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
