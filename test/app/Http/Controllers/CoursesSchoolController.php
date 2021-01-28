<?php

namespace App\Http\Controllers;

use App\coursesSchool;
use App\schools;
use App\CourseType;
use App\accommodationType;
use App\accommodationOptions;
use Illuminate\Http\Request;

class CoursesSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $lang = get_default_lang();
        switch ($lang) {
            case 'ar':
                $slug_col = 'slugAr';
                $slug_col_alt = 'slugEn';
                break;
            
            default:
                $slug_col = 'slugEn';
                $slug_col_alt = 'slugAr';
                break;
        }
        $schools = schools::where($slug_col, $slug)->where('status', 1)->get();
        if (!$schools->count()) {
            if( $schools = schools::query()->where($slug_col_alt, $slug)->where('status', 1)->get() ) {
                return redirect($lang . '/schools/courses/' . $schools->first()->$slug_col);
            } else {
                return abort(404);
            }
        }
        foreach ($schools as $school) {
            foreach ($school->images as $image) {
                $school->images;
            }
            $school->content;
            break;
        }
        $school_arr = $schools->filter(function ($value, $key)
        {
            return $value->images->count();
        });

        if (!$school_arr->count()) {
            return abort(404);
        }

        $pageTitle = ($lang == 'ar' ? $school->titleAr : $school->titleEn);
        $course_ = $school->featuredCourse ?? ( $school->courses->where('courseType_id', 1)->first() ?? $school->courses->first());

        $courseTypes_obj = CourseType::where('status', 1)->get();
        $courseTypes = collect($courseTypes_obj)->groupBy('group_id');

        /*foreach ($courseTypes_obj as $key => $courseType) {
            $courseType->courses;
        }*/

        // return $courseTypes["2"][0]->courses;

        $accommodationTypes = accommodationType::where('status', 1)->get();
        $accommodationAges = accommodationOptions::all()->pluck('accommodationAge');
        $accommodationAges = array_unique($accommodationAges->toArray());
        $airportPickUps = $school->airportPickUp;
        $insurances = $school->insurances;
        $multiPromotionsRecords = $school->multiPromotions;

        $multiPromotions = $multiPromotionsRecords->filter(function ($multiPromotion)
        {
            return ($multiPromotion->promotion->courseBookingFrom <= \Carbon\Carbon::now())&&($multiPromotion->promotion->courseBookingTo >= \Carbon\Carbon::now()) ;
        });

        // return $multiPromotions[0]->promotion;

        $weeks = $this ->getWeeks();
        $start_date = $this->getStartDate();
        $courseFee = $this->getCourseFeePure($course_->id, $weeks); // *weeks
        $visa = $this->getVisa($course_->id, $weeks);
        $courseMaterialFee = $this->getMaterialFee($course_->id, $weeks);
        $schoolPromotion = $this->GetSchoolPromotion($school->id, $course_->id,$start_date, $weeks);

        // return $course;

        return view('school', compact(['school', 'course_','accommodationTypes', 'accommodationAges', 'courseTypes', 'pageTitle', 'airportPickUps', 'insurances', 'multiPromotions', 'weeks', 'start_date', 'courseFee', 'visa', 'courseMaterialFee', 'schoolPromotion']));
    }


    public function getAccommodationsOptions($school, $age)
    {
        $accommodationTypes = \App\accommodationType::where('status', 1)->get();
        $accommodations = \App\accommodation::where('school_id', $school);

        $data = [];

        foreach ($accommodationTypes as $accommodationType) {
            $section = \App\accommodation::where('status', 1)->where('school_id', $school)->where('accommodationType_id', $accommodationType->id)->first();
            $options = \App\accommodationOptions::where('status', 1)->where('accommodationType_id', $accommodationType->id)->first();

            if ($options) {
                $minage = $options->accommodationAge;
                if ($age >= (int)$minage) {
                    if ($section) {
                        $data['section'][$accommodationType->slugEn]['title'] = (get_default_lang() == 'ar' ? $section->titleAr : $section->titleEn);
                        $data['section'][$accommodationType->slugEn]['price'] = $section->bookingFee;
                    }
                    $data['options'][$accommodationType->slugEn]['room'] = (get_default_lang() == 'ar' ? $options->roomType->titleAr : $options->roomType->titleEn);
                    $data['options'][$accommodationType->slugEn]['meal'] = (get_default_lang() == 'ar' ? $options->mealType->titleAr : $options->mealType->titleEn);
                    $data['options'][$accommodationType->slugEn]['facilitie'] = (get_default_lang() == 'ar' ? $options->facilitie->titleAr : $options->facilitie->titleEn);
                    $data['options'][$accommodationType->slugEn]['supplement'] = $options->supplement;
                    $data['options'][$accommodationType->slugEn]['minweeks'] = $options->minimumNumberOfWeeksToBook;
                    $data['options'][$accommodationType->slugEn]['minage'] = $options->accommodationAge;
                }
            }

        }
        return $data;
    }

    private function getAccommodationsOptionFee($accommodationOption, $accommodationWeeks)
    {
        $accommodationOption = accommodationOptions::find($accommodationOption);
        if (!$accommodationOption) {
            return false;
        }
        $accommodation = $accommodationOption->accommodation;
        $accommodationFeeWeeksOptions = $accommodationOption->feeWeeksOptions;


        if (!$accommodationFeeWeeksOptions || !$accommodationFeeWeeksOptions->count()) {
            return false;
        }

        $accommodationFee = $accommodationFeeWeeksOptions->filter(function ($accommodationFeeRecord) use ($accommodationWeeks)
        {
            return ($accommodationFeeRecord->fromWeek <= $accommodationWeeks)&&($accommodationFeeRecord->toWeek >= $accommodationWeeks) ;
        });

        if (!$accommodationFee || ! $accommodationFee->count()) {
            return false;
        }

        return $accommodationFee->first();
    }

    private function getAccommodationsFeeFee($accommodationFee)
    {
        return feeWeeksOptions::find($accommodationFee);
    }

    public function getCourses($school)
    {
        $courseTypes_obj = CourseType::where('status', 1)->get();
        $courseTypes = collect($courseTypes_obj)->groupBy('group_id');

        foreach ($courseTypes_obj as $key => $courseType) {
            $courseType->courses;
        }

        return $courseTypes;
    }

    public function GetSchoolPromotion($school, $course, $start_date, $weeks=1, $accommodationFeeId=0, $accommodationWeeks=1)
    {
        $search = \Session::get('search') ?? [];
        $search['start_date'] = $start_date;
        \Session::put('search', $search);

        $course = coursesSchool::find($course);
        $school = schools::find($school);
        $multiPromotionsRecords = $school->multiPromotions->where('status', 1);

        $multiPromotions_ = $multiPromotionsRecords->filter(function ($multiPromotion)
        {
            return ($multiPromotion->promotion->courseBookingFrom <= \Carbon\Carbon::now())&&($multiPromotion->promotion->courseBookingTo >= \Carbon\Carbon::now()) ;
        });

        if (!$multiPromotions_->count()) {
            return '';
        }

        /*$courseFee = 100;
        $weeks = 1;
        $start_date = \Carbon\Carbon::parse('2021-01-04');
        // $end_date = \Carbon\Carbon::parse('2021-01-25');
        $end_date = (clone $start_date)->addWeeks($weeks); // 2021-02-15
        $validFrom = \Carbon\Carbon::parse('2021-01-11');
        $validTo = \Carbon\Carbon::parse('2021-02-15');*/



        // return ;
        
        /*$multiPromotions__ = $multiPromotions_->filter(function ($multiPromotion)  use($start_date)
        {
            return ($multiPromotion->promotion->validDateFrom <= $start_date)&&($multiPromotion->promotion->validDateTo >= $start_date) ;
        });

        if (!$multiPromotions__->count()) {
            return '';
        }*/

        $multiPromotions = $multiPromotions_->filter(function ($multiPromotion)  use($weeks)
        {
            return ($multiPromotion->bookingDurationFrom <= $weeks)&&($multiPromotion->bookingDurationTo >= $weeks) ;
        });

        $multiPromotions_acc = $multiPromotions_->filter(function ($multiPromotion)  use($accommodationWeeks)
        {
            return ($multiPromotion->bookingDurationFrom <= $accommodationWeeks)&&($multiPromotion->bookingDurationTo >= $accommodationWeeks) ;
        });

        if (!$multiPromotions->count()) {
            return '';
        }

        $start_date = \Carbon\Carbon::parse($start_date);
        $end_date = (clone $start_date)->addWeeks($weeks);
        $accommodation_end_date = (clone $start_date)->addWeeks($accommodationWeeks);
        $courseFee = $this->getCourseFeePure($course->id, $weeks);
        $schoolFee = $school->registrationFee;

        /*if ($accommodationFeeRecord = $this->getAccommodationsOptionFee($accommodationOption, $accommodationWeeks)) {
            $accommodationFee = $accommodationFeeRecord->fee;
        }else{
            $accommodationFee = 0;
        }*/

        if ($accommodationFeeRecord = \App\feeWeeksOptions::find($accommodationFeeId)) {
            $accommodationFee = $accommodationFeeRecord->fee;
        }else{
            $accommodationFee = 0;
        }
        
        $course_values=[];
        $school_values=[];
        $accommodation_values=[];
        $extra_weeks_values=[];
        $discount_weeks_values=[];

        foreach ($multiPromotions as $multiPromotion) {

            $amount = $multiPromotion->amount;
            $type = $multiPromotion->promotion->type;
            $for = $multiPromotion->promotion->for;

            $validFrom = \Carbon\Carbon::parse($multiPromotion->promotion->validDateFrom);
            $validTo = \Carbon\Carbon::parse($multiPromotion->promotion->validDateTo);

            $fullWeeks = ceil($validFrom->diffInDays($validTo)/7);
            $validTo = (clone $validFrom)->addWeeks($fullWeeks);

            switch ($for) {
                // course
                case '1':

                    if ($type == 1 || $type == 2 || $type == 3 || $type == 4) {
                        $course_amount = $amount;
                        $course_discount = ($type == 1 || $type == 3) ? true : false;
                        if ($type == 1 || $type == 2) {
                            $course_percentage = true;
                            $course_monetary = false;
                            $course_value = $this->applicatePromotion($start_date, $end_date, $validFrom, $validTo, $courseFee, $amount,$weeks, $course_percentage, $course_discount);
                        }elseif ($type == 3 || $type == 4) {
                            $course_percentage = false;
                            $course_monetary = true;
                            $course_value = $this->applicatePromotion($start_date, $end_date, $validFrom, $validTo, $courseFee, $amount,$weeks, $course_percentage, $course_discount);
                        }
                        $course_titleEn = $multiPromotion->titleEn;
                        $course_titleAr = $multiPromotion->titleAr;

                        $values = [
                            "fee"=>$courseFee??0,
                            "totalFee"=>$courseFee*$weeks??0,
                            "amount"=>$course_amount??0, 
                            "value"=>$course_value??0,
                            "percentage"=>$course_percentage??false, 
                            "monetary"=>$course_monetary??false, 
                            "discount"=>$course_discount??false,
                            "titleEn" => $course_titleEn??'',
                            "titleAr" => $course_titleAr??'',
                        ];
                        array_push($course_values, $values);
                    }else if($type == 5){
                        //extra free week
                        if (!($start_date>=$validFrom && $validTo>=(clone $end_date)->subDays(3))) {
                            break;
                        }
                        $extra_weeks_amount = $amount;
                        $extra_weeks_titleEn = $multiPromotion->titleEn;
                        $extra_weeks_titleAr = $multiPromotion->titleAr;

                        $values = [
                            "fee" => $courseFee??0,
                            "weeks"=>$weeks??0,
                            "amount"=> $extra_weeks_amount??0,
                            "titleEn"=>$extra_weeks_titleEn??'',
                            "titleAr"=>$extra_weeks_titleAr??'',
                        ];
                        array_push($extra_weeks_values, $values);
                        break;
                    }else if($type == 6){
                        //discount free week
                        if (!($start_date>=$validFrom && $validTo>=(clone $end_date)->subDays(3))) {
                            break;
                        }
                        $discount_weeks_amount = $amount;
                        $discount_weeks_titleEn = $multiPromotion->titleEn;
                        $discount_weeks_titleAr = $multiPromotion->titleAr;

                        $values = [
                            "fee" => $courseFee??0,
                            "weeks"=>$weeks??0,
                            "amount"=> $discount_weeks_amount??0,
                            "titleEn"=>$discount_weeks_titleEn??'',
                            "titleAr"=>$discount_weeks_titleAr??'',
                        ];
                        array_push($discount_weeks_values, $values);
                        break;
                    }else{
                        break;
                    }

                    break;
                
                case '3':
                    // school
                    $school_amount = $amount;
                    $school_discount = ($type == 1 || $type == 3) ? true : false;
                    if ($type == 1 || $type == 2) {
                        $school_percentage = true;
                        $school_monetary = false;
                        $school_value = $school_discount ? ($schoolFee-(($schoolFee*$amount)/100)) : $schoolFee+(($schoolFee*$amount)/100);
                    }elseif ($type == 3 || $type == 4) {
                        $school_percentage = false;
                        $school_monetary = true;
                        $school_value = $school_discount ? ($schoolFee-$amount) : ($schoolFee+$amount);
                    }
                    $school_titleEn = $multiPromotion->titleEn;
                    $school_titleAr = $multiPromotion->titleAr;

                    $values = [
                        "fee"=>$schoolFee??0, 
                        "totalFee"=>$schoolFee*$weeks??0, 
                        "amount"=>$school_amount??0, 
                        "value"=>$school_value??0,
                        "percentage"=>$school_percentage??false, 
                        "monetary"=>$school_monetary??false, 
                        "discount"=>$school_discount??false,
                        "titleEn" => $school_titleEn??'',
                        "titleAr" => $school_titleAr??'',
                    ];
                    array_push($school_values, $values);
                    break;

                default:
            }

        }

        foreach ($multiPromotions_acc as $multiPromotion) {
            $amount = $multiPromotion->amount;
            $type = $multiPromotion->promotion->type;
            $for = $multiPromotion->promotion->for;
            $subFor = $multiPromotion->promotion->subFor;

            $validFrom = \Carbon\Carbon::parse($multiPromotion->promotion->validDateFrom);
            $validTo = \Carbon\Carbon::parse($multiPromotion->promotion->validDateTo);

            $fullWeeks = ceil($validFrom->diffInDays($validTo)/7);
            $validTo = (clone $validFrom)->addWeeks($fullWeeks);

            switch ($for) {
                case '2':
                    if (!$accommodationFee) {
                        break;
                    }
                    // return $accommodationFeeRecord;
                    if ($subFor !== $accommodationFeeRecord->accommodationOption->accommodation->accommodationType_id && $subFor !== 0){
                        break;
                    }
                    $accommodation_amount = $amount;
                    $accommodation_discount = ($type == 1 || $type == 3) ? true : false;
                    if ($type == 1 || $type == 2) {
                        $accommodation_percentage = true;
                        $accommodation_monetary = false;
                        $accommodation_value = $this->applicatePromotion($start_date, $accommodation_end_date, $validFrom, $validTo, $accommodationFee, $amount,$accommodationWeeks, $accommodation_percentage, $accommodation_discount);
                        /*$accommodation_value = $accommodation_discount 
                            ?($accommodationFee*$accommodationWeeks) - ($accommodationFee*$accommodationWeeks*$amount/100)
                            :($accommodationFee*$accommodationWeeks) + ($accommodationFee*$accommodationWeeks*$amount/100)*/;
                    }elseif ($type == 3 || $type == 4) {
                        $accommodation_percentage = false;
                        $accommodation_monetary = true;
                        $accommodation_value = $this->applicatePromotion($start_date, $accommodation_end_date, $validFrom, $validTo, $accommodationFee, $amount,$accommodationWeeks, $accommodation_percentage, $accommodation_discount);
                        /*$accommodation_value = $accommodation_discount 
                            ?($accommodationFee*$accommodationWeeks) - ($accommodationWeeks * $amount)
                            :($accommodationFee*$accommodationWeeks) + ($accommodationWeeks * $amount);*/
                    }
                    $accommodation_titleEn = $multiPromotion->titleEn;
                    $accommodation_titleAr = $multiPromotion->titleAr;

                    $values = [
                        "fee"=>$accommodationFee??0, 
                        "totalFee"=>$accommodationFee*$accommodationWeeks??0, 
                        "amount"=>$accommodation_amount??0, 
                        "value"=>$accommodation_value??0,
                        "percentage"=>$accommodation_percentage??false, 
                        "monetary"=>$accommodation_monetary??false, 
                        "discount"=>$accommodation_discount??false,
                        "titleEn" => $accommodation_titleEn??'',
                        "titleAr" => $accommodation_titleAr??'',
                    ];
                    array_push($accommodation_values, $values);
                    break;

                default:
            }

        }

        return [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'accommodation_end_date' => $accommodation_end_date,

            'course_values'=>$course_values, 
            'school_values' => $school_values, 
            'accommodation_values' => $accommodation_values,

            'extra_weeks_values' => $extra_weeks_values,
            'discount_weeks_values' => $discount_weeks_values,
        ];
    }

    private function applicatePromotion($start_date, $end_date, $validFrom, $validTo, $courseFee, $amount, $weeks, $percentage, $discount) 
    {
        //  1
        if ($end_date <= $validFrom || $start_date >= $validTo) {
            return ($courseFee * $weeks);
        }

        // 2
        else if ($start_date >= $validFrom && $end_date <= $validTo) {
            $pro_weeks = $start_date->diffInWeeks($end_date);
            // $pro_weeks = $validFrom->diffInWeeks($end_date);
            // return (($courseFee * $weeks) - ($courseFee * $weeks * $amount / 100));
        }

        // 3
        else if ($start_date <= $validFrom && $end_date <= $validTo && $end_date > $validFrom) {
            $pro_weeks = $validFrom->diffInWeeks($end_date);
        }

        // 4
        else if ($start_date >= $validFrom && $end_date >= $validTo && $start_date < $validTo) {
            $pro_weeks = $start_date->diffInWeeks($validTo);
        }

        // 5
        else if ($start_date <= $validFrom && $end_date >= $validTo) {
            $pro_weeks = $validFrom->diffInWeeks($validTo);
        }
        else{
            return false;
        }

        $nopro_weeks = $weeks - $pro_weeks;

        if ($percentage){
            if ($discount) {
                return ($courseFee * $nopro_weeks) + (($courseFee * $pro_weeks) - ($courseFee * $pro_weeks * $amount / 100));
            }else{
                return ($courseFee * $nopro_weeks) + (($courseFee * $pro_weeks) + ($courseFee * $pro_weeks * $amount / 100));
            }
        }else{
            return ($courseFee * $nopro_weeks) + (($courseFee * $pro_weeks) - ($amount * $pro_weeks));
        }
    }

    public function GetCourseFee($course, $weeks, $accommodationOption, $accommodationWeeks)
    {
        $this->setWeeks($weeks);
        $course = coursesSchool::where('id', $course)->where('status', 1)->first();
        $school = $course->school;

        // fee
        $records = $course->weeksrange_fees->where('fromWeek', "<=", $weeks)->where('toWeek', ">=", $weeks);
        if ($records->count()) {
            $record = $records->first();
            $fee = $record->fee;
        }else{
            $fee = 0;
        }

        $start_date = $this->getStartDate();
        $materialFee = $this->getMaterialFee($course->id, $weeks);
        $visa = $this->getVisa($course->id, $weeks);
        $promotion = $this->GetSchoolPromotion($school->id, $course->id,$start_date, $weeks, $accommodationOption, $accommodationWeeks);

        return ["fee"=>$fee, "materialFee"=>$materialFee, 'visa' => $visa, 'promotion'=>$promotion];
    }

    // get only fee
    private function getCourseFeePure($course, $weeks)
    {
        $this->setWeeks($weeks);
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

    public function setBooking(Request $request)
    {
        return $request;
    }


    private function getWeeks()
    {
        if(\Session::has('search')){
            $search = \Session::get('search');
            if(array_key_exists('weeks', $search)){
                $weeks = $search['weeks'];
            }else{
                $weeks = 1;
            }
        }else{
           $weeks = 1;
        }

        return $weeks;
    }

    private function setWeeks($weeks)
    {
        $search = \Session::get('search') ?? [];
        $search['weeks'] = $weeks;

        \Session::put('search', $search);
        return true;
    }

    private function getStartDate()
    {
        if(\Session::has('search')){
            $search = \Session::get('search');
            if(array_key_exists('start_date', $search)){
                $start_date = $search['start_date'];
            }else{
                $start_date = '';
            }
        }else{
           $start_date = '';
        }

        return $start_date;
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

    private function getVisa($course, $weeks)
    {
        $course = coursesSchool::where('id', $course)->where('status', 1)->first();
        $school = $course->school;

        if($school->country->visas->count()){
            if($visaRecord = $school->country->visas->where('weekForm', '<=', $weeks)->where('weekTo', '>=', $weeks)->first()){
                if($course->hoursPerWeek >= $visaRecord->minHours){
                    $visaId = $visaRecord->id;
                    $visa = $visaRecord->fee;
                    $visaTitle = get_default_lang() == 'ar' ? $visaRecord->titleAr : $visaRecord->titleEn;
                }else{
                    $visaId = 0;
                    $visa = 0;
                    $visaTitle = '';
                }
            }else{
                $visaId = 0;
                $visa = 0;
                $visaTitle = '';
            }
        }else{
            $visaId = 0;
            $visa = 0;
            $visaTitle = '';
        }

        // return $course->hoursPerWeek;
        return ['visaId' => $visaId, 'visaTitle' => $visaTitle, 'visa'=>$visa];
    }

}
