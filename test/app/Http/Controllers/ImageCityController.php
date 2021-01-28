<?php

namespace App\Http\Controllers;

use App\city;
use App\imageCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $type)
    {
        $city = city::find($id);

        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1 || $city->userId  == Auth::user()->id) {
            return view('dashbord.core.fielscity', compact('city', 'type'));
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $type)
    {
        $city = city::find($id);
        if ($request->type == 1) {
            if ($files = $request->file('file')) {
                $request->validate([
                    'file' => 'required|mimes:jpg,jpeg,png,gif|max:800',
                ]);
                $path = public_path() . "/imageCities/";
                $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($path, $imgfile);
            }
        } else {
            $imgfile = $request->file;
        }

        // dd($imgfile);
        $data = [
            'type' => $type,
            'city_id' => $id,
            'file' => $imgfile,
            'userId' => Auth::user()->id,
        ];
        imageCity::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\imageCity  $imageCity
     * @return \Illuminate\Http\Response
     */
    public function show(imageCity $imageCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\imageCity  $imageCity
     * @return \Illuminate\Http\Response
     */
    public function edit(imageCity $imageCity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\imageCity  $imageCity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $type)
    {
        //
        // dd($request->all());

        if ($type == 1) {
            if ($files = $request->file('file')) {
                $request->validate([
                    'file' => 'required|mimes:jpg,jpeg,png,gif|max:800',
                ]);
                $destinationPath = public_path() . "/imageCities/";
                $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $imgfile);
            }
        } else {
            $imgfile = $request->file;
        }

        // dd($imgfile);
        $data = [
            'file' => $imgfile,
            'userId' => Auth::user()->id,
        ];
        imageCity::where('id', $id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\imageCity  $imageCity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $findCity = imageCity::find($id);

        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1 || $findCity->userId  == Auth::user()->id) {
            imageCity::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
