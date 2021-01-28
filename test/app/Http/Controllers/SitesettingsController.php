<?php

namespace App\Http\Controllers;

use App\footer;
use App\mainpages;
use App\sitesettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class SitesettingsController extends Controller
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
     * @param  \App\sitesettings  $sitesettings
     * @return \Illuminate\Http\Response
     */
    public function show(sitesettings $sitesettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sitesettings  $sitesettings
     * @return \Illuminate\Http\Response
     */
    public function edit(sitesettings $sitesettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sitesettings  $sitesettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sitesettings $sitesettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sitesettings  $sitesettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(sitesettings $sitesettings)
    {
        //
    }
    public function mainPageView()
    {
        # code...
        if (Auth::user()->role == 1) {
            return view('dashbord.site.mainpage.index');
        } else {
            return redirect()->back();
        }
    }
    /**
     * Update Main Page
     */
    public function mainPageViewUpdate(Request $request)
    {
        $inputs = $request->all();

        foreach ($inputs as $key => $value) {
            if ($key == "mainImage") {
                $findOldLogo = mainpages::where('option', "mainImage")->first();
                if ($request->hasfile('mainImage')) {

                    $file = $request->file('mainImage');
                    $ex = $file->getClientOriginalExtension();
                    $filename = 'mainImage' . '.' . $ex;

                    $path = public_path('pages/mainpage/') . $filename;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $file->move(public_path('/pages/mainpage/'), $filename);

                    $data = [
                        'value' => $filename,
                    ];
                    mainpages::where('option', 'mainImage')->update($data);

                    return redirect()->back();
                }
            }
            if ($key == "featureOneIcon") {
                $findOldLogo = mainpages::where('option', "featureOneIcon")->first();
                if ($request->hasfile('featureOneIcon')) {

                    $path = public_path('pages/mainpage/') . $findOldLogo->value;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $file = $request->file('featureOneIcon');
                    $ex = $file->getClientOriginalExtension();
                    $filename = 'featureOneIcon' . '.' . $ex;
                    $path = 'pages/'.$filename;
                    $file->move(public_path('/pages/mainpage/'), $filename);
                    $data = [
                        'value' => $filename,
                    ];
                    mainpages::where('option', 'featureOneIcon')->update($data);

                    return redirect()->back();
                }
            }
            if ($key == "featureTwoIcon") {
                $findOldLogo = mainpages::where('option', "featureTwoIcon")->first();
                if ($request->hasfile('featureTwoIcon')) {

                    $path = public_path('pages/mainpage/') . $findOldLogo->value;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $file = $request->file('featureTwoIcon');
                    $ex = $file->getClientOriginalExtension();
                    $filename = 'featureTwoIcon' . '.' . $ex;
                    $path = 'pages/'.$filename;
                    $file->move(public_path('/pages/mainpage/'), $filename);

                    $data = [
                        'value' => $filename,
                    ];
                    mainpages::where('option', 'featureTwoIcon')->update($data);

                    return redirect()->back();
                }
            }
            if ($key == "featureThreeIcon") {
                $findOldLogo = mainpages::where('option', "featureThreeIcon")->first();
                if ($request->hasfile('featureThreeIcon')) {

                    $path = public_path('pages/mainpage/') . $findOldLogo->value;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $file = $request->file('featureThreeIcon');
                    $ex = $file->getClientOriginalExtension();
                    $filename = 'featureThreeIcon' . '.' . $ex;
                    $path = 'pages/'.$filename;
                    $file->move(public_path('/pages/mainpage/'), $filename);

                    $data = [
                        'value' => $filename,
                    ];
                    mainpages::where('option', 'featureThreeIcon')->update($data);

                    return redirect()->back();
                }
            }

            if ($key !== "_token") {
                $content = mainpages::where('option', $key)->first();
                $data = [
                    'value' => $value,
                ];
                mainpages::where('option', $key)->update($data);
            }
        }
        return redirect()->back();
    }
    /**
     * Footer view
     */
    public function footer()
    {
        # code...
        if (Auth::user()->role == 1) {
            return view('dashbord.site.footer.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Footer Update Data
     */
    public function footerUpdate(Request $request)
    {
        //
        $inputs = $request->all();

        foreach ($inputs as $key => $value) {
            if ($key !== "_token") {
                $content = footer::where('option', $key)->first();
                $data = [
                    'value' => $value,
                    'userId' => Auth::user()->id,
                ];
                footer::where('option', $key)->update($data);
            }
        }
        return redirect()->back();
    }
}
