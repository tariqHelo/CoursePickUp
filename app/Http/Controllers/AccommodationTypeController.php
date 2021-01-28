<?php

namespace App\Http\Controllers;

use App\accommodationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationTypeController extends Controller
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
            $data = accommodationType::all();
            return view('dashbord.core.accommodationtype.index', compact('data'));
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
            return view('dashbord.core.accommodationtype.create');
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
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'slugEn' => $request->slugEn,
            'slugAr' => $request->slugAr,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        accommodationType::create($data);
        return redirect()->route('accommodationstype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\accommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function show(accommodationType $accommodationType)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\accommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $data = accommodationType::find($id);
            return view('dashbord.core.accommodationtype.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\accommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'slugEn' => $request->slugEn,
            'slugAr' => $request->slugAr,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        accommodationType::where('id', $id)->update($data);
        return redirect()->route('accommodationstype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\accommodationType  $accommodationType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            accommodationType::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
