<?php

namespace App\Http\Controllers;

use App\facilitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FacilitieController extends Controller
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
            $data = facilitie::all();
            return view('dashbord.core.facilities.index', compact('data'));
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
            return view('dashbord.core.facilities.create');
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
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        facilitie::create($data);
        return redirect()->route('facilities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\facilitie  $facilitie
     * @return \Illuminate\Http\Response
     */
    public function show(facilitie $facilitie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\facilitie  $facilitie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $data = facilitie::find($id);
            return view('dashbord.core.facilities.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\facilitie  $facilitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        facilitie::where('id', $id)->update($data);
        return redirect()->route('facilities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\facilitie  $facilitie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            facilitie::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
