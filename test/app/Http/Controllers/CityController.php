<?php

namespace App\Http\Controllers;

use App\city;
use App\countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
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
            $cities = city::all();
            return view('dashbord.core.city', compact('cities'));
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
            return view('dashbord.core.addcity', compact('countries'));
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
        // dd($request->all());
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'slug' => $request->slug,
            'country_id' => $request->country,
            'population' => $request->population,
            'contentAr' => $request->contentAr,
            'contentEn' => $request->contentEn,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        city::create($data);
        return redirect('admin/dashbord/cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $data = city::where('id', $id);
            $countries = countries::all();
            return view('dashbord.core.editcity', compact('data', 'countries'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'slug' => $request->slug,
            'country_id' => $request->country,
            'population' => $request->population,
            'contentAr' => $request->contentAr,
            'contentEn' => $request->contentEn,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        city::where('id', $id)->update($data);
        return redirect('admin/dashbord/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            city::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
