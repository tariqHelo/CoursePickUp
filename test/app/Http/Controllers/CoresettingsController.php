<?php

namespace App\Http\Controllers;

use App\generalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\languages;
use Illuminate\Support\Facades\Auth;

class CoresettingsController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coresettings  $coresettings
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coresettings  $coresettings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coresettings  $coresettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coresettings  $coresettings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * page show Values of General Settings Website ...
     */
    public function generalSettings()
    {
        # code...
        if (Auth::user()->role == 1) {
            return view('dashbord.core.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update Value Of General Setting by Option and set the value .
     */
    public function updateGeneralSettings(Request $request)
    {
        # code...
        $inputs = $request->all();

        foreach ($inputs as $key => $value) {
            if ($key == "logo") {
                $findOldLogo = generalSetting::where('option', "logo")->first();
                if ($request->hasfile('logo')) {
                    
                    $path = public_path('site/') . $findOldLogo->value;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $file = $request->file('logo');
                    $ex = $file->getClientOriginalExtension();
                    $filename = 'logo' . '.' . $ex;
                    $file->move(public_path('/site/'), $filename);

                    $data = [
                        'value' => $filename,
                    ];
                    generalSetting::where('option', 'logo')->update($data);

                    return redirect()->back();
                }
            }
            if ($key == "favicon") {
                $findOldfavicon = generalSetting::where('option', "favicon")->first();
                if ($request->hasfile('favicon')) {

                    $path = public_path('site/') . $findOldfavicon->value;
                    // dd($path);
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $file = $request->file('favicon');
                    $ex = $file->getClientOriginalExtension();
                    $filename = 'favicon' . '.' . $ex;
                    $file->move(public_path('/site/'), $filename);

                    $data = [
                        'value' => $filename,
                    ];
                    generalSetting::where('option', 'favicon')->update($data);

                    return redirect()->back();
                }
            }

            if ($key == 'phoneNumber') {
                $data = [
                    'value' => $request->phoneNumber,
                ];
                generalSetting::where('option', 'phoneNumber')->update($data);
                return redirect()->back();
            }

            if ($key !== "_token") {
                $content = generalSetting::where('option', $key)->first();
                $data = [
                    'value' => $value,
                ];
                generalSetting::where('option', $key)->update($data);
            }
        }
        // exit;
        return redirect()->back();
    }
    /**
     * All Languages
     */
    public function Languages()
    {
        # code...
        $data = languages::all();
        return view('dashbord.core.languages', compact('data'));
    }
    /**
     * return to view
     */
    public function addLanguage()
    {
        # code...
        return view('dashbord.core.addlanguage');
    }
    /**
     * store new Language
     */
    public function postLanguage(Request $request)
    {
        # code...
        if ($request->hasfile('icon')) {

            $file = $request->file('icon');
            $ex = $file->getClientOriginalExtension();
            $filename = 'languages/' . $request->name  . '.' . $ex;
            $file->move(public_path('/languages/'), $filename);
        }
        $data = [
            'name' => $request->name,
            'icon' => $filename,
            'status' => $request->status,
            'userId' => Auth::user()->id
        ];

        languages::create($data);
        return redirect('admin/dashbord/languages');
    }
    /**
     * delete Language
     */
    public function deleteLanguage($id)
    {
        # code...
        languages::find($id)->delete();
        return redirect()->back();
    }
    /**
     * edit Language
     */
    public function editLanguage($id)
    {
        # code...
        $data = languages::find($id);

        return view('dashbord.core.editlanguage', compact('id', 'data'));
    }
    /**
     * Update Language
     */
    public function updateLanguage(Request $request, $id)
    {
        # code...
        $findThisLanuage = languages::find($id);
        if ($request->hasfile('icon')) {

            $file = $request->file('icon');
            $ex = $file->getClientOriginalExtension();
            $filename = 'languages/' . $request->name  . '.' . $ex;
            $file->move(public_path('/languages/'), $filename);
        } else {
            $filename = $findThisLanuage->icon;
        }
        $data = [
            'name' => $request->name,
            'icon' => $filename,
            'status' => $request->status,
            'userId' => Auth::user()->id
        ];
        languages::where('id', $id)->update($data);

        return redirect('admin/dashbord/languages');
    }
}
