<?php

namespace App\Http\Controllers;

use App\countries;
use App\visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisaController extends Controller
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
            $visas = visa::all();
            return view('dashbord.core.visa', compact('visas'));
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
            $countries = countries::all();
            return view('dashbord.core.addvisa', compact('countries'));
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
            'country_id' => $request->country,
            'weekForm' => $request->weekForm,
            'weekTo' => $request->weekTo,
            'fee' => $request->fee,
            'minHours' => $request->minHours,
            'maxHours' => $request->maxHours,
            'userId' => Auth::user()->id,
        ];
        visa::create($data);
        return redirect()->route('visa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function show(visa $visa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $visa = visa::find($id);
            $countries = countries::all();
            return view('dashbord.core.editvisa', compact('visa', 'countries'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'country_id' => $request->country,
            'weekForm' => $request->weekForm,
            'weekTo' => $request->weekTo,
            'minHours' => $request->minHours,
            'maxHours' => $request->maxHours,
            'userId' => Auth::user()->id,
        ];
        visa::where('id', $id)->update($data);
        return redirect()->route('visa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            visa::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
