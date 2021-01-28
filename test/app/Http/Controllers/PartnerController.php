<?php

namespace App\Http\Controllers;

use App\partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'edit', Auth::user()->id) == 1 || getPermissionUser('Site', 'create', Auth::user()->id) == 1) {

            $data = partner::all();
            // dd($data);
            return view('dashbord.partner.index', compact('data'));
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
    public function store(Request $request)
    {
        //
        // dd($request->all());
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'edit', Auth::user()->id) == 1 || getPermissionUser('Site', 'create', Auth::user()->id) == 1) {

            $request->validate([
                'logo' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
            if ($files = $request->file('logo')) {

                $files = $request->file('logo');
                $destinationPath = public_path() . "/partner/logos";
                $imgfile =  date('YmdHis') . "." . $files->getClientOriginalExtension();
                $path = 'partner/logos/' . $imgfile;
                $files->move($destinationPath, $path);
            }
            $data = [
                'logo' => $imgfile,
                'userId' => Auth::user()->id,
            ];
            partner::create($data);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(partner $partner)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'edit', Auth::user()->id) == 1 || getPermissionUser('Site', 'create', Auth::user()->id) == 1) {

            $findOldLogo = partner::find($id);
            $path = public_path($findOldLogo->logo);
            if (File::exists($path)) {
                File::delete($path);
            }
            $request->validate([
                'logo' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
            if ($files = $request->file('logo')) {

                $files = $request->file('logo');
                $destinationPath = public_path() . "/partner/logos";
                $imgfile =  date('YmdHis') . "." . $files->getClientOriginalExtension();
                $path = 'partner/logos/' . $imgfile;
                $files->move($destinationPath, $path);
            }
            
            $data = [
                'logo' => $imgfile,
                'userId' => Auth::user()->id,
            ];
            partner::where('id', $id)->update($data);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'delete', Auth::user()->id) == 1) {

            $findOldLogo = partner::find($id);
            $path = public_path($findOldLogo->logo);
            if (File::exists($path)) {
                File::delete($path);
            }
            partner::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
