<?php

namespace App\Http\Controllers;

use App\destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = destination::all();
        return view('dashbord.core.destinations.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashbord.core.destinations.create');
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

        destination::create($data);
        return redirect()->route('destinations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = destination::find($id);
        return view('dashbord.core.destinations.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\destination  $destination
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

        destination::where('id', $id)->update($data);
        return redirect()->route('destinations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        destination::find($id)->delete();
        return redirect()->route('destinations.index');
    }
}
