<?php

namespace App\Http\Controllers;

use App\nationalities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NationalitiesController extends Controller
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
            $data = nationalities::all();
            return view('dashbord.core.nationality.index', compact('data'));
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
            return view('dashbord.core.nationality.create');
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
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'status' => $request->status,
        ];
        nationalities::create($data);
        return redirect()->route('nationality.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nationalities  $nationalities
     * @return \Illuminate\Http\Response
     */
    public function show(nationalities $nationalities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nationalities  $nationalities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $data = nationalities::find($id);
            return view('dashbord.core.nationality.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nationalities  $nationalities
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
        nationalities::where('id', $id)->update($data);
        return redirect()->route('nationality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nationalities  $nationalities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            nationalities::find($id)->delete();
            return redirect()->route('nationality.index');
        } else {
            return redirect()->back();
        }
    }
}
