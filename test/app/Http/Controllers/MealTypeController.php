<?php

namespace App\Http\Controllers;

use App\mealType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealTypeController extends Controller
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
            $data = mealType::all();
            return view('dashbord.core.mealtype.index', compact('data'));
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
            return view('dashbord.core.mealtype.create');
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
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        mealType::create($data);
        return redirect()->route('mealtype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function show(mealType $mealType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'edit', Auth::user()->id) == 1) {
            $data = mealType::find($id);
            return view('dashbord.core.mealtype.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        mealType::where('id', $id)->update($data);
        return redirect()->route('mealtype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Core', 'delete', Auth::user()->id) == 1) {
            mealType::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
