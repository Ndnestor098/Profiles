<?php

namespace App\Http\Controllers;

use App\Imports\ProfilesImport;
use App\Models\ds;
use App\Models\Profile;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::paginate(50);
        return view('profiles.index', compact('profiles'));
    }

    public function upload()
    {
        return view('profiles.upload');
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
        $request->validate([
            'file' => ['required', 'file', 'mimes:xlsx,xls'],
        ]);

        Excel::import(new ProfilesImport, $request->file('file'));

        return redirect()->back()->with('success', 'Excel importado correctamente ✅');
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
