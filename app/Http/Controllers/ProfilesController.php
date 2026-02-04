<?php

namespace App\Http\Controllers;

use App\Models\ds;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::paginate(20);
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ds $ds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ds $ds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ds $ds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ds $ds)
    {
        //
    }
}
