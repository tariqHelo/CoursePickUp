<?php

namespace App\Http\Controllers;

use App\city;
use App\countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'create', Auth::user()->id) == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1 ) {
            $data = countries::all();
            return view('dashbord.core.countries', compact('data'));
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
            return view('dashbord.core.addcountries');
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
        if ($files = $request->file('image')) {
            $files = $request->file('image');
            $destinationPath = public_path() . "/countries/";
            $imgfile = 'countries/' .  $request->slug . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        }
        // $slugTitle = Str::slug($request->)
        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'slug' => $request->slug,
            'image' => $imgfile,
            'featured' => $request->featured,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        countries::create($data);
        return redirect('admin/dashbord/countries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $data = countries::find($id);
        // return view('dashbord.core.countries', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $data = countries::find($id);
            return view('dashbord.core.editcountries', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($files = $request->file('image')) {
            $files = $request->file('image');
            $destinationPath = public_path() . "/countries/";
            $imgfile = 'countries/' .  $request->slug . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = countries::find($id)->image;
        }
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'featured' => $request->featured,
            'image' => $imgfile,
            'status' => $request->status,
        ];
        countries::where('id', $id)->update($data);
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            $cites = city::where('country_id', $id)->get();
            foreach ($cites as $key => $value) {
                # code...
                city::find($value->id)->delete();
            }
            countries::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
