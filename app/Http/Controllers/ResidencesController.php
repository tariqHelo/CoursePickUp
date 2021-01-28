<?php

namespace App\Http\Controllers;

use App\residences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'create', Auth::user()->id) == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            $data = residences::all();
            return view('dashbord.core.residence.index', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'create', Auth::user()->id) == 1) {
            return view('dashbord.core.residence.create');
        } else {
            return redirect()->back();
        }
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
        //
        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'status' => $request->status,
        ];
        residences::create($data);
        return redirect()->route('residence.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function show(residences $residences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $data = residences::find($id);
            return view('dashbord.core.residence.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'status' => $request->status,
        ];
        residences::where('id', $id)->update($data);
        return redirect()->route('residence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            residences::find($id)->delete();
            return redirect()->route('residence.index');
        } else {
            return redirect()->back();
        }
    }
}
