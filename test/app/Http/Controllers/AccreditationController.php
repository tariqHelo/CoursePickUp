<?php

namespace App\Http\Controllers;

use App\accommodation;
use App\accreditation;
use App\schools;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $school = schools::find($id);
        return view('dashbord.schools.accreditations.index', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        // dd($request->all());
        $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png,gif,ico,icon',
        ]);
        if ($files = $request->file('logo')) {
            $files = $request->file('logo');
            $destinationPath = public_path() . "/Schools/accreditations";
            $imgFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        }
        $data = [
            'school_id' => $id,
            'logo' => $imgFile,
            'userId' => Auth::user()->id,
        ];
        accreditation::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function show(accreditation $accreditation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function edit(accreditation $accreditation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $findOldLogo = accreditation::find($id);
        // dd($findOldLogo);
        $path = public_path() . $findOldLogo->logo;
        if (File::exists($path)) {
            File::delete($path);
        }
        $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png,gif,ico,icon',
        ]);
        if ($files = $request->file('logo')) {
            $files = $request->file('logo');
            $destinationPath = public_path() . "/schools/accreditations";
            $imgFile = '/schools/accreditations/' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        }
        $data = [
            'logo' => $imgFile,
            'userId' => Auth::user()->id,
        ];
        accreditation::where('id', $id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        accreditation::find($id)->delete();
        return redirect()->back();
    }
}
