<?php

namespace App\Http\Controllers;

use App\mainpages;
use App\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1) {
            $data = pages::all();
            return view('dashbord.site.pages.index', compact('data'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'edit', Auth::user()->id) == 1) {
            $data = pages::where('id', $id);
            return view('dashbord.site.pages.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        if ($files = $request->file('image')) {
            $files = $request->file('image');
            $destinationPath = public_path() . "/pages/";
            $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            if ($request->image == null) {
                $findImage = pages::where('id', $id)->first();
                $imgfile = $findImage->image;
            } else {
                $imgfile = "pages/01.jpg";
            }
        }
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'slugEn' => $request->slugEn,
            'slugAr' => $request->slugAr,
            'image' => $imgfile,
            'contentEn' => $request->contentEn,
            'contentAr' => $request->contentAr,
            'userId' => Auth::user()->id,
        ];
        pages::where('id', $id)->update($data);
        return redirect('admin/dashbord/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(pages $pages)
    {
        //

    }
    /**
     * Find Pages by Slug
     */
    public function findPage($slug)
    {
        # code...
        $findPageEn = pages::where('slugEn', $slug)->count();
        // dd($findPageEn);
        $findPageAr = pages::where('slugAr', $slug)->count();
        if ($findPageAr !== 0) {
            $data = pages::where('slugAr', $slug)->first();
        } elseif ($findPageEn !== 0) {
            $data = pages::where('slugEn', $slug)->first();
        }
        dd($data);
    }
}
