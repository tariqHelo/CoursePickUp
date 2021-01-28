<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Booking;
use App\schools;
use App\coursesSchool;
use App\feeWeeksOptions;
use App\nationalities;
use App\residences;
use App\WeeksRangeMaterialfee;

use \Jenssegers\Agent\Agent;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd (Booking::all());
        $data = $request->all();
        \Session::put('data', $data);
        // return $data;

        $school = schools::find($request['school']);
        $course = coursesSchool::find($request['course']);

        $courseFee = $this->getCourseFeePure($course->id, $data['weeks']);

        $start_date = \Carbon\Carbon::parse($data['start_date']);
        $end_date = (clone $start_date)->addWeeks($data['weeks'])->subDays(3);

        if($data['extra_weeks_promotion']){
            $end_date = (clone $start_date)->addWeeks($data['weeks']+$data['extra_weeks_promotion'])->subDays(3);
        }

        if ($data['accommodationFee']) {
            $accommodationFee = feeWeeksOptions::find($data['accommodationFee']);
            $accommodationOption = $accommodationFee->accommodationOption;
        }else{
            $accommodationOption = null;
        }

        $promotions = json_decode($data['promotionsInput']);

        $nationalities = nationalities::where('status', 1)->get();
        $residences = residences::where('status', 1)->get();

        return view('booking', compact('school', 'course', 'data', 'start_date', 'end_date', 'courseFee', 'accommodationOption', 'promotions', 'residences'));
    }

    public function indexGet()
    {
        $data = \Session::get('data');

        $school = schools::find($data['school']);
        $course = coursesSchool::find($data['course']);

        $courseFee = $this->getCourseFeePure($course->id, $data['weeks']);

        $start_date = \Carbon\Carbon::parse($data['start_date']);
        $end_date = (clone $start_date)->addWeeks($data['weeks'])->subDays(3);

        if ($data['accommodationFee']) {
            $accommodationFee = feeWeeksOptions::find($data['accommodationFee']);
            $accommodationOption = $accommodationFee->accommodationOption;
        }else{
            $accommodationOption = null;
        }

        $promotions = json_decode($data['promotionsInput']);

        $nationalities = nationalities::where('status', 1)->get();
        $residences = residences::where('status', 1)->get();

        return view('booking', compact('school', 'course', 'data', 'start_date', 'end_date', 'courseFee', 'accommodationOption', 'promotions', 'residences'));
    }

    
    public function set(Request $request)
    {

        $admin_logged_in = (\Auth::user()) && (\Auth::user()->role == 1 || \Auth::user()->role == 2 || \Auth::user()->role == 3) ? 1 : 0;

        if (!$admin_logged_in) {
            $validator = \Validator::make($request->all(), [
                '_token' => 'required',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|max:255',
                'nationality' => 'required|integer',
                'residence' => 'required|integer',
                'notes' => 'string|nullable',
            ]);
            if ($validator->fails()) {
                return redirect()->route('bookingGet')->withInput()->withErrors($validator);
            }
        }

        $data = \Session::get('data');
        if (!$data) {
            return abort(404);
        }

        do{
            $booking_id = strtoupper(Str::random(10));
        }
        while (Booking::where('booking_id', $booking_id)->count());

        $start_date = \Carbon\Carbon::parse($data['start_date']);


        $agent_ = new Agent;
        
        if ($agent_->isDesktop()) {
            $device =  1;
        }else if($agent_->isMobile()){
            $device =  2;
        }else if($agent_->isTablet()){
            $device =  3;
        }else{
            $device =  0;
        }

        if ($admin_logged_in) {
            $status = 0;
        }else{
            $status = 1;
        }

        $lang = get_default_lang();

        $extra_weeks_promotion = json_encode([$data['extra_weeks_promotionTitleEn'], $data['extra_weeks_promotionTitleAr'], $data['extra_weeks_promotion']]);
        $discount_weeks_promotion = json_encode([$data['discount_weeks_promotionTitleEn'], $data['discount_weeks_promotionTitleAr'], $data['discount_weeks_promotion']]);
        $booking = [
            'booking_id' => $booking_id,
            'first_name' => $request->first_name??null,
            'last_name' => $request->last_name??null,
            'email' => $request->email??null,
            'phone' => $request->phone??null,
            'nationality_id' => $request->nationality??null,
            'residence_id' => $request->residence??null,
            'notes' => $request->notes??null,
            'start_date' => $start_date,
            'weeks' => $data['weeks'],
            'school_id' => $data['school'],
            'course_id' => $data['course'],
            'materialFee_id' => $data['materialFeeId']??null,
            'materialFee_type' => $data['materialFeeType']??null,
            'feeweeksoptions_id' => $data['accommodationFee']??null,
            'accommodation_weeks' => $data['accommodationWeeks']??null,
            'airportPickUp_id' => $data['airportPickUpId']??null,
            'airportPickUp_type' => $data['airportPickUpType']??null,
            'insurance_id' => $data['insuranceId']??null,
            'visa_id' => $data['visaId']??null,
            'promotions' => $data['promotionsInput']??null,
            'extra_weeks' => $data['extra_weeks_promotion'] ? $extra_weeks_promotion:null,
            'discount_weeks' => $data['discount_weeks_promotion'] ? $discount_weeks_promotion:null,
            'total' => $data['total'],
            'invoice' => '',
            'device' => $device,
            'lang' => $lang,
            'status' => $status,
        ];

        Booking::create($booking);
        // $this->invoice($booking_id);

        return redirect()->route('booking.confirmation', [$booking_id, $lang]);
    }


    public function confirmation($booking_id, $lang)
    {
        $data = \Session::get('data');
        if ($data) {
            \Session::forget('data');
        }

        $data = $this->invoice($booking_id, $lang);
        $school = $data['school'];
        $course = $data['course'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $courseFee = $data['courseFee'];
        $accommodationOption = $data['accommodationOption'];
        $promotions = $data['promotions'];
        $booking = $data['booking'];
        $materialFee = $data['materialFee'];
        $extra_weeks = $data['extra_weeks'];
        $discount_weeks = $data['discount_weeks'];

        // $lang = $data['lang'];

        return view('booking_confirmation', compact('school', 'course', 'start_date', 'end_date', 'courseFee', 'accommodationOption', 'promotions', 'extra_weeks',  'discount_weeks','booking', 'materialFee', 'lang'));
    }



    public function requestsDraft()
    {
        $requests = Booking::where('status', 0)->get();
        return view('dashbord.booking.draft', compact('requests'));
    }

    public function requestsUnconfirmed()
    {
        $requests = Booking::where('status', 1)->get();
        return view('dashbord.booking.unconfirmed', compact('requests'));
    }

    public function requests()
    {
        $requests = Booking::where('status', 2)->get();
        return view('dashbord.booking.index', compact('requests'));
    }

    public function show($booking)
    {

        $booking = Booking::find($booking);

        $school = $booking->school;
        $course = $booking->course;

        $courseFee = $this->getCourseFeePure($course->id, $booking->weeks);

        $start_date = \Carbon\Carbon::parse($booking->start_date);
        $end_date = (clone $start_date)->addWeeks($booking->weeks)->subDays(3);

        if ($booking->feeweeksoptions_id) {
            $accommodationFee = feeWeeksOptions::find($booking->feeweeksoptions_id);
            $accommodationOption = $accommodationFee->accommodationOption;
            $accommodationBookingFee = $accommodationOption->accommodation->bookingFee;
        }else{
            $accommodationOption = null;
            $accommodationFee = null;
            $accommodationBookingFee = null;
        }

        if ($booking->materialFee_id) {
            if ($booking->materialFee_type == 3) {
                $materialFeeRecord = WeeksRangeMaterialfee::find($booking->materialFee_id);
                $materialFee = $materialFeeRecord->fee;
            }
        }else{
            if($booking->materialFee_type == 2) {
                $materialFee = $course->materialFeeAmount*$booking->weeks;
            }else{
                $materialFee = $course->materialFeeAmount;
            }
        }

        $promotions = json_decode($booking->promotions);

        return view('dashbord.booking.request', compact('booking', 'school', 'course', 'start_date', 'end_date', 'courseFee', 'accommodationOption', 'promotions', 'accommodationFee', 'materialFee', 'accommodationBookingFee'));
    }

    public function edite($id, $stage)
    {
        $booking = Booking::find($id);
        $nationalities = nationalities::all();
        $residences = residences::all();
        return view('dashbord.booking.edit', compact('booking', 'nationalities', 'residences', 'stage'));

    }

    public function update(Request $request, $id, $stage)
    {
        $validator = \Validator::make($request->all(), [
            '_token' => 'required',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'nationality' => 'required|integer',
            'residence' => 'required|integer',
            'notes' => 'string|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $booking = Booking::find($id);

        $booking->first_name = $request->first_name;
        $booking->last_name = $request->last_name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->nationality_id = $request->nationality;
        $booking->residence_id = $request->residence;
        $booking->notes = $request->notes;
        $booking->status = $request->status;
        
        $booking->save();
        (new \Mcamara\LaravelLocalization\LaravelLocalization)->setLocale($booking->lang);
        $data = $this->invoice($booking->booking_id, $booking->lang);
        (new \Mcamara\LaravelLocalization\LaravelLocalization)->setLocale('en');

        $booking->invoice = $booking->booking_id.'.pdf';
        $booking->save();

        switch ($stage) {
            case 'draft':
                $dist  = 'booking.requests.draft';
                break;

            case 'unconfirmed':
                $dist  = 'booking.requests.unconfirmed';
                break;

            case 'confirmed':
                $dist  = 'booking.requests';
                break;
        }

        return redirect()->route($dist);
    }

    public function destroy($booking)
    {
        Booking::find($booking)->delete();
        return back();
    }

    private function invoice($booking_id, $lang)
    {
        $booking = Booking::where('booking_id', $booking_id)->first();
        $course = coursesSchool::find($booking->course_id);
        $school = schools::find($booking->school_id);

        $courseFee = $this->getCourseFeePure($course->id, $booking->weeks);

        $start_date = \Carbon\Carbon::parse($booking->start_date);
        $end_date = (clone $start_date)->addWeeks($booking->weeks)->subDays(3);

        $extra_weeks = $booking->extra_weeks ? json_decode($booking->extra_weeks) : 0;
        $discount_weeks = $booking->discount_weeks ? json_decode($booking->discount_weeks) : 0;

        if ($extra_weeks) {
            $end_date = (clone $start_date)->addWeeks(($booking->weeks)+$extra_weeks[2])->subDays(3);
        }

        if ($booking->feeweeksoptions_id) {
            $accommodationFee = feeWeeksOptions::find($booking->feeweeksoptions_id);
            $accommodationOption = $accommodationFee->accommodationOption;
        }else{
            $accommodationOption = null;
        }

        $materialFee = $this->getMaterialFee($course->id, $booking->weeks);
        $promotions = json_decode($booking->promotions);


        $pdf = \PDF::loadView('dashbord.booking.invoice', compact('school', 'course', 'start_date', 'end_date', 'courseFee', 'accommodationOption', 'promotions', 'extra_weeks',  'discount_weeks', 'booking', 'materialFee', 'lang'));
        // return $pdf->stream('invoice.pdf');

        \Storage::disk('public')->put('invoices/'.$booking->booking_id.'.pdf', $pdf->output());
        $booking->invoice = $booking->booking_id.'.pdf';
        $booking->save();

        return compact(['school', 'course', 'start_date', 'end_date', 'courseFee', 'accommodationOption', 'promotions', 'extra_weeks',  'discount_weeks','booking', 'materialFee', 'lang']);
    }

    // get only fee
    private function getCourseFeePure($course, $weeks)
    {
        $course = coursesSchool::where('id', $course)->where('status', 1)->first();
        $records = $course->weeksrange_fees->where('fromWeek', "<=", $weeks)->where('toWeek', ">=", $weeks);
        if ($records->count()) {
            $record = $records->first();
            $courseFee = ($record->fee);
        }else{
            $courseFee = 0;
        }

        return $courseFee;
    }

    private function getMaterialFee($course, $weeks)
    {
        $course = coursesSchool::where('id', $course)->where('status', 1)->first();

        if($course->materialFeeType_id == 3){
            if($course->weeksrangematerial_fees->count()){
                if($materialFeeRecord = $course->weeksrangematerial_fees->where('fromWeek', '<=', $weeks)->where('toWeek', '>=', $weeks)->first()){
                    $materialFee = $materialFeeRecord->fee;
                    $materialFeeId = $materialFeeRecord->id;
                    $materialFeeType = 3;
                }else{
                    $materialFee = 0;
                    $materialFeeId = 0;
                    $materialFeeType = 0;
                }
                
            }else{
                $materialFee = 0;
                $materialFeeId = 0;
                $materialFeeType = 0;
            }
        }else if($course->materialFeeType_id == 2){
            $materialFee = $course->materialFeeAmount*$weeks;
            $materialFeeId = 0;
            $materialFeeType = 2;
        }
        else{
            $materialFee = $course->materialFeeAmount;
            $materialFeeId = 0;
            $materialFeeType = 2;
        }
        return ['materialFee'=>$materialFee, 'materialFeeId'=>$materialFeeId, 'materialFeeType'=>$materialFeeType];
    }
}
