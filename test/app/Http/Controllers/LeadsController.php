<?php

namespace App\Http\Controllers;

use App\countries;
use App\leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Leads', 'edit', Auth::user()->id) == 1) {
        }
        $data = leads::where('type', $id)->get();
        $total  = leads::where('type', $id)->count();
        $countries = countries::all();
        $nationalities = countries::all();
        // dd($data);

        return view('dashbord.leads.' . $id . '.index', compact('data', 'id', 'total', 'countries', 'nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Leads', 'create', Auth::user()->id) == 1) {
            $countries = countries::all();
            return view('dashbord.leads.' . $id . '.create', compact('id', 'countries'));
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
    public function store(Request $request, $id)
    {
        //
        // dd($_SERVER['HTTP_USER_AGENT']);

        //create new agent instance
        // $agent = new Jenssegers\Agent\Agent();

        // //check if agent is robot
        // if ($agent->isRobot()) {
        //     return $agent->robot();
        // }
        // //if agent is not robot then get agent browser and platform like Chrome in Linux
        // $agent = $agent->browser() . " in " . $agent->platform();
        // //if agent browser and platform not obtained, then we check the agent technology
        // if ($agent == ' in ') {
        //     $agent =  request()->header('User-Agent');
        // }
        // return $agent;

        // $request->save();
        if (Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            $userId = "NULL";
        }
        $findLastId = leads::orderBy('id', 'desc')->withTrashed()->first();
        $data = [
            // 'id' => $findLastId->id + 1,
            'fName' => $request->fName,
            'lName' => $request->lName,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'placeOfResidence' => $request->placeOfResidence,
            'notes' => $request->notes,
            'destination' => $request->destination,
            'invoice' => $request->invoice,
            'device' => $request->header('User-Agent'),
            'currency' => $request->currency,
            'type' => $id,
            'userId' => $userId,
            'institution' => $request->institution,
            'subject' => $request->subject,
        ];
        leads::create($data);
        return redirect('admin/dashbord/leads/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function show($id, $lead)
    {
        //
        $count = leads::where('type', $id)->where('id', $lead)->count();
        // dd($count);
        if ($count == 0) {
            return redirect('admin/dashbord/leads/' . $id);
        }
        $data = leads::where('type', $id)->where('id', $lead)->first();
        // dd($data->destination);


        $countries = countries::all();
        return view('dashbord.leads.' . $id . '.show', compact('id', 'data', 'countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $lead)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Leads', 'edit', Auth::user()->id) == 1) {
            $count = leads::where('type', $id)->where('id', $lead)->count();
            // dd($count);
            if ($count == 0) {
                return redirect('admin/dashbord/leads/' . $id);
            }
            $data = leads::where('type', $id)->where('id', $lead)->first();
            // dd($data);
            $countries = countries::all();
            return view('dashbord.leads.' . $id . '.edit', compact('id', 'data', 'countries'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $lead)
    {
        //
        // dd($request->destination);
        if (Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            $userId = "NULL";
        }
        $data = [
            'fName' => $request->fName,
            'lName' => $request->lName,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'placeOfResidence' => $request->placeOfResidence,
            'notes' => $request->notes,
            'destination' => $request->destination,
            'invoice' => $request->invoice,
            'device' => $request->device,
            'currency' => $request->currency,
            'type' => $id,
            'userId' => $userId,
            'institution' => $request->institution,
            'subject' => $request->subject,
        ];
        leads::where('id', $lead)->update($data);
        return redirect('admin/dashbord/leads/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $lead)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Leads', 'delete', Auth::user()->id) == 1) {
            leads::where('id', $lead)->delete();
            return redirect('admin/dashbord/leads/' . $id);
        } else {
            return redirect()->back();
        }
    }
}
