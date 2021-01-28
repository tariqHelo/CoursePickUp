<?php

namespace App\Http\Controllers;

use App\dashbord;
use App\leads;
use App\permission;
use App\schools;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $start_date = Carbon::parse()->toDateTimeString();
    

        // dd($resToWeekLeads);
        $leads = leads::orderby('id', 'desc')->take(6)->get();
        return view('dashbord.index', compact('leads'));
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
     * @param  \App\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function show(dashbord $dashbord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function edit(dashbord $dashbord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dashbord $dashbord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dashbord  $dashbord
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashbord $dashbord)
    {
        //
    }
    /**
     * find School By City
     */
    public function findSchoolByCity($id)
    {
        # code...
        $data = schools::where('city_id', $id)->where('status', 1)->get();
        $dataCount = schools::where('city_id', $id)->where('status', 1)->count();
        // dd($dataCount);

        if ($dataCount == 0) {
            // dd($data);
            $data = [
                'data' => 404,
            ];
            return response()->json($data); 
        } else {
            $outpot = '';
            foreach ($data as $key => $row) {
                $outpot .= '<option value="' . $row->id . '">' . $row->titleEn . '</option><br/>';
            }

            return response()->json($outpot);
        }
    }
}
