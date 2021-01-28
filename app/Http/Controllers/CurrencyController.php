<?php

namespace App\Http\Controllers;

use App\currency;
use App\currrency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = currency::all();
        return view('dashbord.core.currency', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashbord.core.addcurrency');
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
            'name' => $request->name,
            'code' => $request->code,
            'usd' => $request->usd,
            'gbp' => $request->gbp,
            'eur' => $request->eur,
            'cad' => $request->cad,
            'aud' => $request->aud,
            'nzd' => $request->nzd,
            'aed' => $request->aed,
            'kwd' => $request->kwd,
            'sar' => $request->sar,
            'omr' => $request->omr,
            'bhd' => $request->bhd,
            'jod' => $request->jod,
            'qar' => $request->qar,
            'myr' => $request->myr,
            'try' => $request->try,
            'egp' => $request->egp,
        ];
        currency::create($data);
        return redirect()->route('currency.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\currrency  $currrency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\currrency  $currrency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = currency::find($id);
        return view('dashbord.core.editcurrency', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\currrency  $currrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        //
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'usd' => $request->usd,
            'gbp' => $request->gbp,
            'eur' => $request->eur,
            'cad' => $request->cad,
            'aud' => $request->aud,
            'nzd' => $request->nzd,
            'aed' => $request->aed,
            'kwd' => $request->kwd,
            'sar' => $request->sar,
            'omr' => $request->omr,
            'bhd' => $request->bhd,
            'jod' => $request->jod,
            'qar' => $request->qar,
            'myr' => $request->myr,
            'try' => $request->try,
            'egp' => $request->egp,
        ];
        currency::where('id', $id)->update($data);
        return redirect()->route('currency.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\currrency  $currrency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        currency::find($id)->delete();
        return redirect()->back();
    }

    public function setCurrency($currency)
    {
        $cur = strtolower($currency);
        \Session::put('currency', $cur);
        return redirect()->back();
    }
}
