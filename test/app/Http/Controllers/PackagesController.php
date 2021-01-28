<?php

namespace App\Http\Controllers;

use App\city;
use App\countries;
use App\packages;
use App\schools;
use App\CourseType;
use App\accommodationType;
use App\roomType;
use App\mealType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages = packages::all();
        return view('dashbord.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *a
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Packages', 'create', Auth::user()->id) == 1) {

            $countries = countries::where('status', 1)->get();
            $courseTypes = CourseType::where('status', 1)->get();
            $accommodations = accommodationType::where('status', 1)->get();
            $roomTypes = roomType::where('status', 1)->get();
            $mealsTypes = mealType::where('status', 1)->get();

            return view('dashbord.packages.create', compact('countries',  'courseTypes', 'accommodations', 'roomTypes', 'mealsTypes'));
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
        $otherType = '';
        foreach ($request->input('otherType') as $key => $value) {
            $otherType .=  $request->input('otherType')[$key] .  '|';
        }

        if ($files = $request->file('image')) {
            $destinationPath = public_path() . "/Packages";
            $imgFile = '/Packages/' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        } else {
            $imgFile = '/Packages/01.jpg';
        }
        $data  = [
            'country_id' => $request->country,
            'city_id' => $request->city,
            'school_id' => $request->school,
            'courseType_id' => $request->courseType,
            'lessonWeek' => $request->lessonWeek,
            'duration' => $request->duration,
            'accommodationType' => $request->accommodationType,
            'roomType_id' => $request->roomType,
            'mealsType_id' => $request->mealsType,
            'airportPickUp' => $request->airportPickUp,
            'healthInsurance' => $request->healthInsurance,
            'studentVisa' => $request->studentVisa,
            'featured' => $request->featured,
            'fee' => $request->fee,
            'otherType' => $otherType,
            'feeDiscount' => $request->feeDiscount,
            'userId' => Auth::user()->id,
        ];
        packages::create($data);
        return redirect('admin/dashbord/packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show(packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Packages', 'edit', Auth::user()->id) == 1) {

            $package = packages::find($id);

            $countries = countries::where('status', 1)->get();
            $courseTypes = CourseType::where('status', 1)->get();
            $accommodations = accommodationType::where('status', 1)->get();
            $roomTypes = roomType::where('status', 1)->get();
            $mealsTypes = mealType::where('status', 1)->get();
            $schools = schools::where('status', 1)->get();

            return view('dashbord.packages.edit', compact('package', 'countries',  'courseTypes', 'accommodations', 'roomTypes', 'mealsTypes', 'schools'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $otherType = '';
        foreach ($request->input('otherType') as $key => $value) {
            # code...
            $otherType .=  $request->input('otherType')[$key] .  '|';
        }
        if ($files = $request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $destinationPath = public_path() . "/Packages";
            $imgFile = '/Packages/' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        } else {
            $findThisPackage = packages::find($id);

            $imgFile = $findThisPackage->image;
        }
        $data  = [
            'country_id' => $request->country,
            'city_id' => $request->city,
            'school_id' => $request->school,
            'courseType_id' => $request->courseType,
            'lessonWeek' => $request->lessonWeek,
            'duration' => $request->duration,
            'accommodationType' => $request->accommodationType,
            'roomType_id' => $request->roomType,
            'mealsType_id' => $request->mealsType,
            'airportPickUp' => $request->airportPickUp,
            'healthInsurance' => $request->healthInsurance,
            'studentVisa' => $request->studentVisa,
            'featured' => $request->featured,
            'fee' => $request->fee,
            'otherType' => $otherType,
            'feeDiscount' => $request->feeDiscount,
            'userId' => Auth::user()->id,
            
        ];
        packages::where('id', $id)->update($data);
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Packages', 'delete', Auth::user()->id) == 1) {

            packages::find($id)->delete();
            return redirect()->route('packages.index');
        } else {
            return redirect()->back();
        }
    }
}
