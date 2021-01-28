<?php

namespace App\Http\Controllers;

use App\multiPromotions;
use App\promotion;
use App\schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Promotions', 'create', Auth::user()->id) == 1) {
            $promotions = promotion::all();
            return view('dashbord.promotion.index', compact('promotions'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Promotions', 'create', Auth::user()->id) == 1) {
            $schools = schools::all();
            return view('dashbord.promotion.create', compact('schools'));
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
        $data = [
            'type' => $request->type,
            'for' => $request->for,
            'subFor' => $request->for == 2 ? $request->subFor : 1,
            'validDateFrom' => $request->validDateFrom,
            'validDateTo' => $request->validDateTo,
            'courseBookingFrom' => $request->courseBookingFrom,
            'courseBookingTo' => $request->courseBookingTo,
            'userId' => Auth::user()->id,
        ];

        $promotion = promotion::create($data);

        foreach ($request->input('repeater-group') as $key => $value) {
            $MultiPromotions = [
                'promotion_id' => $promotion->id,
                'titleAr' => $request->input('repeater-group')[$key]['titleAr'],
                'titleEn' => $request->input('repeater-group')[$key]['titleEn'],
                'school_id' => $request->input('repeater-group')[$key]['school'],
                'amount' => $request->input('repeater-group')[$key]['amount'],
                'bookingDurationFrom' => $request->input('repeater-group')[$key]['bookingDurationFrom'],
                'bookingDurationTo' => $request->input('repeater-group')[$key]['bookingDurationTo'],
                'status' => $request->input('repeater-group')[$key]['status'],
            ];
            multiPromotions::create($MultiPromotions);
        }
        return redirect()->route('promotion.index');
    }

    public function show($id)
    {
        $school = schools::find($id);
        $promotions = promotion::all();
        return view('dashbord.promotion.show', compact('promotions', 'school'));
    }


    public function edit($id)
    {
        if (Auth::user()->role == 1 || getPermissionUser('Promotions', 'edit', Auth::user()->id) == 1) {
            $promotion = promotion::find($id);
            $schools = schools::all();

            return view('dashbord.promotion.edit', compact('promotion', 'schools'));
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'type' => $request->type,
            'for' => $request->for,
            'subFor' => $request->for == 2 ? $request->subFor : 1,
            'validDateFrom' => $request->validDateFrom,
            'validDateTo' => $request->validDateTo,
            'courseBookingFrom' => $request->courseBookingFrom,
            'courseBookingTo' => $request->courseBookingTo,
            'userId' => Auth::user()->id,
        ];
        promotion::where('id', $id)->update($data);

        foreach ($request->input('repeater-group') as $key => $value) {
            # code...
            if ($request->input('repeater-group')[$key]['this_id'] == null) {
                $MultiPromotion = [
                    'promotion_id' => $id,
                    'titleAr' => $request->input('repeater-group')[$key]['titleAr'],
                    'titleEn' => $request->input('repeater-group')[$key]['titleEn'],
                    'school_id' => $request->input('repeater-group')[$key]['school'],
                    'amount' => $request->input('repeater-group')[$key]['amount'],
                    'bookingDurationFrom' => $request->input('repeater-group')[$key]['bookingDurationFrom'],
                    'bookingDurationTo' => $request->input('repeater-group')[$key]['bookingDurationTo'],
                    'status' => $request->input('repeater-group')[$key]['status'],
                ];
                // dd($MultiPromotions);
                multiPromotions::create($MultiPromotion);
            }
            $MultiPromotions = [
                'titleAr' => $request->input('repeater-group')[$key]['titleAr'],
                'titleEn' => $request->input('repeater-group')[$key]['titleEn'],
                'school_id' => $request->input('repeater-group')[$key]['school'],
                'amount' => $request->input('repeater-group')[$key]['amount'],
                'bookingDurationFrom' => $request->input('repeater-group')[$key]['bookingDurationFrom'],
                'bookingDurationTo' => $request->input('repeater-group')[$key]['bookingDurationTo'],
                'status' => $request->input('repeater-group')[$key]['status'],
            ];
            multiPromotions::where('id', $request->input('repeater-group')[$key]['this_id'])->update($MultiPromotions);
        }



        return redirect()->route('promotion.index');
    }

    public function destroy($id)
    {
        if (Auth::user()->role == 1 || getPermissionUser('Promotions_id', 'delete', Auth::user()->id) == 1) {
            $findMultiPromotionsToDelete = multiPromotions::where('promotion_id', $id)->count();
            $findMultiPromotions = multiPromotions::where('promotion_id', $id)->get();
            if ($findMultiPromotionsToDelete == 0) {
                promotion::find($id)->delete();
            } else {
                promotion::find($id)->delete();
                foreach ($findMultiPromotions as $row) {
                    multiPromotions::find($row->id)->delete();
                }
            }

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
