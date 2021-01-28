<?php

namespace App\Http\Controllers;

use App\accommodation;
use App\accommodationOptions;
use App\airportPickUp;
use App\city;
use App\contentschools;
use App\countries;
use App\coursesFees;
use App\coursesSchool;
use App\CourseType;
use App\currency;
use App\WeeksRangeMaterialfee;
use App\filesSchool;
use App\Insurance;
use App\insuranceFee;
use App\materialfeeType;
use App\schools;
use App\accommodationType;
use App\roomType;
use App\mealType;
use App\facilitie;
use App\feeWeeksOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchoolsController extends Controller
{

    public function index()
    {
        $schools = schools::all();
        return view('dashbord.schools.index', compact('schools'));
    }

    public function create()
    {
        if (Auth::user()->role == 1 || getPermissionUser('Schools', 'create', Auth::user()->id) == 1) {

            $countries = countries::all();
            $cities = city::all();
            $currencies = currency::all();
            return view('dashbord.schools.create', compact('countries', 'cities', 'currencies'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            '_token' => 'required',
            'titleAr' => 'required|string',
            'titleEn' => 'required|string',
            'slugAr' => 'required|string|unique:schools',          
            'slugEn' => 'required|string|unique:schools',
            'currency' => 'required',
            'country' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'registrationFee' => 'required',
            'logo' => 'required|image',

        ]);
        if ($files = $request->file('logo')) {
            $destinationPath = public_path() . "/Schools/Logo";
            $imgFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $path = '/Schools/Logo/' . $imgFile;
            $files->move($destinationPath, $path);
        } else {
            $imgFile = '01.jpg';
        }

        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'slugAr' => $request->slugAr,
            'slugEn' => $request->slugEn,
            'featuredMainPage' => $request->featuredMainPage,
            'featuredCountryPage' => $request->featuredCountryPage,
            'featuredCityPage' => $request->featuredCityPage,
            'currency_id' => $request->currency,
            'country_id' => $request->country,
            'city_id' => $request->city,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'logo' => $imgFile,
            'rating' => $request->rating ?? 0,
            'registrationFee' => $request->registrationFee,
            'status' => 0,
            'userId' => Auth::user()->id,
        ];
        schools::create($data);
        return redirect('admin/dashbord/schools');
    }

    public function show(schools $schools)
    {
        //
    }

    public function edit($id)
    {
        if (Auth::user()->role == 1 || getPermissionUser('Schools', 'edit', Auth::user()->id) == 1) {
            $countries = countries::where('status', 1)->get();
            $cities = city::where('status', 1)->get();
            $currencies = currency::all();
            $school = schools::find($id);
            return view('dashbord.schools.edit', compact('school', 'countries', 'cities', 'currencies'));
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            '_token' => 'required',
            'titleAr' => 'required|string',
            'titleEn' => 'required|string',
            'slugAr' => 'required|string|unique:schools,slugAr,'.$id,          
            'slugEn' => 'required|string|unique:schools,slugEn,'.$id,
            'currency' => 'required',
            'country' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'registrationFee' => 'required',
            'logo' => 'image',
        ]);
        if ($files = $request->file('logo')) {
            $destinationPath = public_path() . "/Schools/Logo";
            $imgFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $path = '/Schools/Logo/' . $imgFile;
            $files->move($destinationPath, $path);
        } else {
            $file = schools::find($id);
            $imgFile = $file->logo;
        }

        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'slugAr' => $request->slugAr,
            'slugEn' => $request->slugEn,
            'featuredMainPage' => $request->featuredMainPage,
            'featuredCountryPage' => $request->featuredCountryPage,
            'featuredCityPage' => $request->featuredCityPage,
            'currency_id' => $request->currency,
            'country_id' => $request->country,
            'city_id' => $request->city,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'logo' => $imgFile,
            'rating' => $request->rating,
            'registrationFee' => $request->registrationFee,
            'status' => $request->status ?? 0,
            'userId' => Auth::user()->id,
        ];
        if(!schools::find($id)->content || !schools::find($id)->files){ $data['status'] = 0; }
        schools::where('id', $id)->update($data);
        return redirect('admin/dashbord/schools');
    }

    public function destroy($id)
    {
        if (Auth::user()->role == 1 || getPermissionUser('Schools', 'delete', Auth::user()->id) == 1) {
            schools::find($id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    /**
     * View Add Photo
     */
    public function addPhotosView($id)
    {
        $data = filesSchool::where('type', 1)->get();
        return view('dashbord.schools.photos.index', compact('data', 'id'));
    }
    /**
     * Store  Photo
     */
    public function addPhotosStore(Request $request, $id)
    {
        if ($files = $request->file('file')) {
            $files = $request->file('file');
            $destinationPath = public_path() . "/Schools/photos";
            $imgFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        } else {
            $imgFile = '01.jpg';
        }
        $data = [
            'school_id' => $id,
            'type' => 1,
            'file' => $imgFile,
            'userId' => Auth::user()->id,
        ];
        filesSchool::create($data);
        return redirect()->back();
    }

    /**
     * Delete A photo By Id
     */
    public function deletePhoto($id)
    {
        filesSchool::find($id)->delete();
        return redirect()->back();
    }


    /** Videos School */

    /**
     * View Video School ...
     */
    public function viewVideosSchool($id)
    {
        $data = filesSchool::where('type', 2)->get();
        return view('dashbord.schools.videos.index', compact('data', 'id'));
    }
    /**
     * Store Video link
     */
    public function addVideoStore(Request $request, $id)
    {
        $data = [
            'school_id' => $id,
            'type' => 2,
            'file' => $request->file,
            'userId' => Auth::user()->id,
        ];
        filesSchool::create($data);
        return redirect()->back();
    }
    /**
     * view add Content
     */
    public function viewContent($id)
    {
        $school = schools::find($id);
        $content = $school->content;
        return view('dashbord.schools.content.index', compact('school', 'content'));
    }

    /**
     * Store Content school 
     */
    public function schoolContent(Request $request, $id)
    {
        $school = schools::find($id);
        $content = $school->content;

        $data = [
            'school_id' => $id,
            'metaDescriptionEn' => $request->metaDescriptionEn,
            'metaDescriptionAr' => $request->metaDescriptionAr,
            'shortDescriptionEn' => $request->shortDescriptionEn,
            'shortDescriptionAr' => $request->shortDescriptionAr,
            'headingEn' => $request->headingEn,
            'headingAr' => $request->headingAr,
            'descriptionEn' => $request->descriptionEn,
            'descriptionAr' => $request->descriptionAr,
            'pageTitleEn' => $request->pageTitleEn,
            'pageTitleAr' => $request->pageTitleAr,
            'userId' => Auth::user()->id,
        ];

        if (!$content) {
            contentschools::create($data);
        } else {
            contentschools::where('school_id', $id)->update($data);
        }
        return redirect()->back();
    }

    /**
     * View to show all Courses to this {$id} School
     */
    public function viewCourses($id)
    {
        $school = schools::find($id);
        $courses = coursesSchool::where('school_id', $id)->get();
        return view('dashbord.schools.courses.index', compact('school', 'courses'));
    }

    /**
     * 
     * Delete Courese 
     * 
     */
    public function deleteCourseSchool($id)
    {
        coursesSchool::find($id)->delete();
        return redirect()->back();
    }
    /**
     * Function go to Create Course
     */
    public function viewCoursesCreate($id)
    {
        $schools = schools::all();
        return view('dashbord.schools.courses.create', compact('id', 'schools'));
    }
    /**
     * Function Store Coures ...
     */
    public function storeCourses(Request $request, $id)
    {
        # code...

        // dd($request->all());

        $coursesSchool = new coursesSchool;
        $coursesSchool->school_id = $id;
        $coursesSchool->titleAr = $request->titleAr;
        $coursesSchool->titleEn = $request->titleEn;
        $coursesSchool->maxStudents = $request->maxStudents;
        $coursesSchool->minAge = $request->minAge;
        $coursesSchool->hoursPerWeek = $request->hoursPerWeek;
        $coursesSchool->lessonsPerWeek = $request->lessonsPerWeek;
        $coursesSchool->courseType_id = $request->shortCourseType;
        $coursesSchool->courierFees = $request->courierFees;
        $coursesSchool->minBookingWeeks = $request->minBookingWeeks;
        $coursesSchool->materialFeeType_id = $request->materialFeeType;
        $coursesSchool->materialFeeAmount = $request->materialFeeAmount;
        $coursesSchool->requiredLevel = $request->requiredLevel;
        $coursesSchool->status = $request->status;
        $coursesSchool->featuredSchoolPage = $request->featuredSchoolPage;
        $coursesSchool->userId = Auth::user()->id;
        $coursesSchool->save();


        $ids = DB::table('coursesschools')->orderBy('id', 'DESC')->first();

        // dd($ids);

        if ($request->materialFeeType == 3) {
            // dd($ids->id);
            return redirect()->route('viewCoursesMaterialFee', $ids->id);
        } else {
            return redirect()->route('viewCourses', $id);
        }
    }

    /**
     * courses School Update
     */
    public function viewCoursesEdit($id)
    {
        $course = coursesSchool::find($id);
        $courseTypes = CourseType::all();
        $materialfeeTypes = materialfeeType::all();
        return view('dashbord.schools.courses.edit', compact('course', 'courseTypes', 'materialfeeTypes'));
    }

    public function coursesUpdate(Request $request, $id)
    {
        $course = coursesSchool::find($id);
        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'courseType_id' => $request->shortCourseType,
            'maxStudents' => $request->maxStudents,
            'minAge' => $request->minAge,
            'hoursPerWeek' => $request->hoursPerWeek,
            'lessonsPerWeek' => $request->lessonsPerWeek,
            'courierFees' => $request->courierFees,
            'minBookingWeeks' => $request->minBookingWeeks,
            'materialFeeType_id' => $request->materialFeeType,
            'materialFeeAmount' => $request->materialFeeAmount,
            'requiredLevel' => $request->requiredLevel,
            'status' => $request->status,
            'featuredSchoolPage' => $request->featuredSchoolPage,
            'userId' =>  Auth::user()->id,
        ];

        $course->update($data);
        return redirect('admin/dashbord/school/courses/' . $course->school->id);
    }

    /**
     * view accommodations
     */

    public function viewaccommodations($id)
    {
        $school = schools::find($id);
        $accommodations = accommodation::where('school_id', $id)->get();
        return view('dashbord.schools.accommodations.index', compact('accommodations', 'school'));
    }
    /**
     * view Accommodation Create
     */
    public function viewAccommodationCreate($id)
    {
        $school = schools::find($id);
        $accommodationTypes = accommodationType::where('status', 1)->get();
        return view('dashbord.schools.accommodations.create', compact('accommodationTypes', 'school'));
    }
    /**
     * store Accommodation
     */
    public function storeAccommodation(Request $request, $id)
    {
        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'school_id' => $id,
            'accommodationType_id' => $request->accommodationType,
            'bookingFee' => $request->bookingfee,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        accommodation::create($data);
        return redirect('admin/dashbord/school/accom/' . $id);
    }
    /**
     * Delete Accommodation
     */
    public function deleteAccommodation($id)
    {
        # code...
        accommodation::find($id)->delete();
        return redirect()->back();
    }
    /**
     * view Accommodation Edit
     */
    public function viewAccommodationEdit($id)
    {
        $accommodation = accommodation::find($id);
        $accommodationTypes = accommodationType::where('status', 1)->get();
        return view('dashbord.schools.accommodations.edit', compact('accommodation', 'accommodationTypes'));
    }
    /**
     * Accommodation Update
     */
    public function AccommodationUpdate(Request $request, $id)
    {

        $data = [
            'titleAr' => $request->titleAr,
            'titleEn' => $request->titleEn,
            'accommodationType_id' => $request->accommodationType,
            'bookingFee' => $request->bookingfee,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        $findReturnId = accommodation::find($id)->school;
        accommodation::where('id', $id)->update($data);
        return redirect('admin/dashbord/school/accom/' . $findReturnId->id);
    }
    /**
     * Add Accommodation Options
     */
    public function addAccommodationOptions($id)
    {
        $accommodation = accommodation::find($id);
        $roomTypes = roomType::all();
        $mealTypes = mealType::all();
        $facilities = facilitie::all();
        return view('dashbord.schools.accommodations.options.create', compact(['accommodation', 'roomTypes', 'mealTypes', 'facilities']));
    }

    public function storeAccommodationOptions(Request $request, $id)
    {
        # code...
        $findSchool = accommodation::find($id);
        $data = [
            'accommodation_id' => $id,
            'school_id' => $findSchool->school,
            'roomType_id' => $request->roomType,
            'mealType_id' => $request->mealType,
            'facilitie_id' => $request->facilitie,
            'supplement' => $request->supplement,
            'supplementAr' => $request->supplementAr,
            'minimumNumberOfWeeksToBook' => $request->minimumNumberOfWeeksToBook,
            'accommodationAge' => $request->accommodationAge,
            'status' => $request->status,
            'userId' => Auth::user()->id,
        ];
        accommodationOptions::create($data);
        return redirect()->route('allAccommodationOptions', $id);
    }

    /**
     * view Accommodation Options Edit
     */
    public function viewAccommodationOptionsEdit($id)
    {
        $accommodationOption = accommodationOptions::find($id);
        $roomTypes = roomType::all();
        $mealTypes = mealType::all();
        $facilities = facilitie::all();
        return view('dashbord.schools.accommodations.options.edit', compact(['accommodationOption','roomTypes', 'mealTypes', 'facilities']));
    }
    /**
     * update Accommodation Options
     */
    public function updateAccommodationOptions(Request $request, $id)
    {
        # code...
        // dd($request->all());
        $accommodationOption = accommodationOptions::find($id);
        // dd($accommodationOption->accommodation);
        $data = [
            'roomType_id' => $request->roomType,
            'mealType_id' => $request->mealType,
            'facilitie_id' => $request->facilitie,
            'supplement' => $request->supplement,
            'supplementAr' => $request->supplementAr,
            'minimumNumberOfWeeksToBook' => $request->minimumNumberOfWeeksToBook,
            'accommodationAge' => $request->accommodationAge,
            'status' => $request->status,
        ];
        // dd($data);
        accommodationOptions::where('id', $id)->update($data);

        return redirect()->route('allAccommodationOptions', $accommodationOption->accommodation_id);
    }
    /**
     * All Accommodation Options
     */
    public function allAccommodationOptions($id)
    {
        $accommodation = accommodation::find($id);
        return view('dashbord.schools.accommodations.options.index', compact('accommodation'));
    }
    /**
     * View fees Weeks Options
     */
    public function viewFeesWeeksOptions($id)
    {
        $accommodationOption = accommodationOptions::find($id);
        $feeWeeksOptions = $accommodationOption->feeWeeksOptions;
        
        return view('dashbord.schools.accommodations.options.fee.editupdate', compact('accommodationOption', 'feeWeeksOptions'));
    }
    /**
     * delete FeesWeeks Options
     */
    public function deleteFeesWeeksOptions($id)
    {
        $feeWeeksOptions = feeWeeksOptions::where('accommodationOption_id', $id)->get();
        foreach ($feeWeeksOptions as $feeWeeksOption) {
            $feeWeeksOption->delete();
        }
        $accommodationOption = accommodationOptions::find($id);
        $accommodation_id = $accommodationOption->accommodation->id;
        $accommodationOption->delete();
        return redirect()->route('allAccommodationOptions', $accommodation_id);
    }
    /**
     * store Fees Weeks Options
     */
    public function storeFeesWeeksOptions(Request $request, $id)
    {
        $this->validate($request, [
            'repeater-group.*.fromWeek' => 'required',
            'repeater-group.*.toWeek' => 'required',
            'repeater-group.*.fee' => 'required',
        ]);

        $feeWeeksOptions = feeWeeksOptions::where('accommodationOption_id', $id)->get();
        foreach ($feeWeeksOptions as $feeWeeksOption) {
            $feeWeeksOption->delete();
        }

        foreach ($request->input('repeater-group') as $key => $value) {
            $data = [
                'fromWeek' => $value['fromWeek'],
                'toWeek' => $value['toWeek'],
                'accommodationOption_id' => $id,
                'fee' =>    $value['fee'],
                'userId' => Auth::user()->id,
            ];
            feeWeeksOptions::create($data);
        }
        $accommodation = accommodationOptions::find($id)->accommodation;
        return redirect()->route('allAccommodationOptions', $accommodation ->id);
    }

    /**
     * AirportPickUp Start ...
     */

    /**
     * view Airport Pick-Up
     */
    public function viewAirportPickUp($id)
    {
        $school = schools::find($id);
        return view('dashbord.schools.airportpickup.index', compact('school'));
    }

    /**
     * view Airport Pick-Up Create
     */
    public function viewAirportPickUpCreate($id)
    {
        $school = schools::find($id);
        return view('dashbord.schools.airportpickup.create', compact('school'));
    }
    /**
     * store Airport Pick-Up
     */
    public function storeAirportPickUp(Request $request, $id)
    {
        $data = [
            'school_id' => $id,
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'roundWay' => $request->roundWay,
            'oneWay' => $request->oneWay,
            'userId' => Auth::user()->id,
        ];

        airportPickUp::create($data);
        return redirect()->route('viewAirportPickUp', $id);
    }

    /**
     * view Airport Pick-Up Edit
     */
    public function viewAirportPickUpEdit($id)
    {
        $airportPickUp = airportPickUp::find($id);
        return view('dashbord.schools.airportpickup.edit', compact('airportPickUp'));
    }
    /**
     * update Airport Pick-Up
     */
    public function updateAirportPickUp(Request $request, $id)
    {
        # code...
        // dd($request->all());\

        $airportPickUp = airportPickUp::find($id);

        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'roundWay' => $request->roundWay,
            'oneWay' => $request->oneWay,
            'userId' => Auth::user()->id,
        ];
        airportPickUp::where('id', $id)->update($data);
        return redirect()->route('viewAirportPickUp', $airportPickUp->school_id);
    }
    /** 
     * delete Airport Pick-Up
     */
    public function deleteAirportPickUp($id)
    {
        # code...
        airportPickUp::find($id)->delete();
        return redirect()->back();
    }


    /**
     * AirportPickUp Done
     */





    /**
     * Insurances Start ...
     */


    /**
     * view Insurances
     */
    public function viewInsurances($id)
    {
        $school = schools::find($id);
        $insurances = $school->insurances;
        return view('dashbord.schools.insurances.index', compact('insurances', 'school'));
    }

    /**
     * view Insurances Create
     */
    public function viewInsurancesCreate($id)
    {
        $school = schools::find($id);
        return view('dashbord.schools.insurances.create', compact('school'));
    }
    /**
     * store Insurances
     */
    public function storeInsurances(Request $request, $id)
    {
        # code...
        // dd($request->all());
        $data = [
            'school_id' => $id,
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'status' => $request->status,
            'fee' => $request->fee,
            'userId' => Auth::user()->id,
        ];
        // dd($data);

        Insurance::create($data);
        return redirect()->route('viewInsurances', $id);
    }

    /**
     * view Insurances Edit
     */
    public function viewInsurancesEdit($id)
    {
        $insurance = Insurance::find($id);
        return view('dashbord.schools.insurances.edit', compact('insurance'));
    }
    /**
     * update Insurances
     */
    public function updateInsurances(Request $request, $id)
    {
        # code...
        // dd($request->all());\

        $findThisInsurance = Insurance::find($id);

        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'status' => $request->status,
            'fee' => $request->fee,
            'userId' => Auth::user()->id,
        ];
        Insurance::where('id', $id)->update($data);
        return redirect()->route('viewInsurances', $findThisInsurance->school_id);
    }
    /** 
     * delete Insurances
     */
    public function deleteInsurances($id)
    {
        # code...
        Insurance::find($id)->delete();
        return redirect()->back();
    }
    /**
     * Insurances Done
     */
    
    /**
     * delete Accommodation Option
     */
    public function deleteAccommodationOption($id)
    {
        # code...
        accommodationOptions::find($id)->delete();
        return redirect()->route('allAccommodationOptions', $id);
    }


    /**
     * delete Courses Material Fee
     */
    public function deleteCoursesMaterialFee($id)
    {
        # code...
        $data = materialType::find($id);
        if ($data === null) {
            return redirect()->back();
        } else {
            $data->delete($id);
            return response()->json(['status' => '200']);
        }
    }
    /**
     * delete Courses Fee
     */
    public function deleteCoursesFee($id)
    {
        # code...
        // dd($id);

        $data = coursesFees::find($id);
        if ($data === null) {
            return redirect()->back();
        } else {
            $data->delete($id);
            return response()->json(['status' => '200']);
        }
    }
    /**
     * view Courses Material Fee
     */
    public function viewCoursesMaterialFee($id)
    {
        $course = coursesSchool::find($id);
        if (!$course) {
            return abort(404);
        }

        if ($course->materialFeeType_id == 3) {
            return view('dashbord.schools.courses.fee.material', compact('course'));
        } else {
            return abort(404);
        }
    }
    /**
     * store Courses Fee
     */
    public function storeCoursesMaterialFee(Request $request, $id)
    {
        $course = coursesSchool::find($id);
        $this->validate($request, [
            'repeater-group.*.fromWeek' => 'required',
            'repeater-group.*.toWeek' => 'required',
            'repeater-group.*.fee' => 'required',
        ]);

        WeeksRangeMaterialfee::where('course_id', $id)->delete();
        if ($request->input('repeater-group')) {
            foreach ($request->input('repeater-group') as $key => $value) {            
                $data = [
                    'course_id' => $id,
                    'fromWeek' => $value['fromWeek'],
                    'toWeek' => $value['toWeek'],
                    'fee' =>    $value['fee'],
                    'userId' => Auth::user()->id,
                ];
                WeeksRangeMaterialfee::create($data);
            }
        }
        return redirect()->route('viewCourses', $course->school->id);
    }

    /**
     * view Course Fee
     */
    public function viewCourseFee($id)
    {
        $course = coursesSchool::find($id);
        if (!$course) {
            return abort(404);
        } else {
            return view('dashbord.schools.courses.fee.coursefee', compact('course'));
        }
    }
    /**
     * store Course Fee
     */
    public function storeCourseFee(Request $request, $id)
    {
        $course = coursesSchool::find($id);
        $this->validate($request, [
            'repeater-group.*.fromWeek' => 'required',
            'repeater-group.*.toWeek' => 'required',
            'repeater-group.*.fee' => 'required',
        ]);

        coursesFees::where('course_id', $id)->delete();
        if ($request->input('repeater-group')) {
            foreach ($request->input('repeater-group') as $key => $value) {            
                $data = [
                    'course_id' => $id,
                    'fromWeek' => $value['fromWeek'],
                    'toWeek' => $value['toWeek'],
                    'fee' =>    $value['fee'],
                    'userId' => Auth::user()->id,
                ];
                coursesFees::create($data);
            }
        }
        return redirect()->route('viewCourses', $course->school->id);
    }
}
