<?php

namespace App\Http\Controllers;

use App\multiPromotions;
use Illuminate\Http\Request;

class MultiPromotionsController extends Controller
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
     * @param  \App\multiPromotions  $multiPromotions
     * @return \Illuminate\Http\Response
     */
    public function show(multiPromotions $multiPromotions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\multiPromotions  $multiPromotions
     * @return \Illuminate\Http\Response
     */
    public function edit(multiPromotions $multiPromotions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\multiPromotions  $multiPromotions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, multiPromotions $multiPromotions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\multiPromotions  $multiPromotions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        multiPromotions::find($id)->delete();
        return response()->json(['status' => '200']);
    }
}
