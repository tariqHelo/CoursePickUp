<?php

namespace App\Http\Controllers;

use App\city;
use App\countries;
use App\coursesSchool;
use App\CourseType;
use App\destination;
use App\leads;
use App\nationalities;
use App\schools;
use App\packages;
use App\services;
use App\articles;
use App\mainpages;
use App\partner;
use App\generalSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($lang = null)
    {
        switch ($lang) {
            case 'En':
                $lang = 'En';
                break;
            case 'en':
                $lang = 'En';
                break;

            case 'Ar':
                $lang = 'ar';
                break;
            case 'ar':
                $lang = 'ar';
                break;

            default:
                $lang = 'Ar';
                break;
        }

        $lang = app()->getLocale();

        $features = mainpages::all();
        $featuredCountries = countries::query()->where('status', 1)->where('featured', 1)->take(6)->get();
        $countries = countries::query()->where('status', 1)->get();
        $featuredSchools = schools::query()->where('status', 1)->where('featuredMainPage',1)->take(9)->get();

        foreach ($featuredSchools as $school) {
            foreach ($school->images as $image) {
                $school->images;
            }
            $school->content;
        }

        $schools = $featuredSchools->filter(function ($value, $key)
        {
            return ($value->images->count() && $value->courses->count());
        });

        $featuredPackages = packages::query()->where('featured',1)->take(9)->get();
        $featuredArticles = articles::query()->where('status', 1)->where('featured',1)->where("$lang", 1)->take(3)->get();
        $partners =partner::all();
        
        if($lang == 'ar') {
            $bigTitle = $features->where('option', 'bigTitleAr')->first()->value;
            $bigTitle_arr = explode('-', $bigTitle);
            $smallTitle =$features->where('option', 'smallTitleAr')->first()->value;
        }else{
            $bigTitle = $features->where('option', 'bigTitleEn')->first()->value;
            $bigTitle_arr = explode('-', $bigTitle);
            $smallTitle =$features->where('option', 'smallTitleEn')->first()->value;
        }
        
        $mainImage =$features->where('option', 'mainImage')->first()->value;

        return view('home', compact('lang', 'featuredCountries', 'countries', 'features', 'bigTitle_arr', 'smallTitle', 'mainImage', 'partners', 'schools', 'featuredPackages', 'featuredArticles'));
    }

    /*public function searchHomePage( $country = null, $city = null, $course = null, $date = null)
    {
       if ($country = null && $country = null) {
           return redirect()->route('/');
       }elseif ($country = null ){

       }
    }
    public function GetCityAgainstMainCatEdit($id)
    {
       return  city::query()->where('country', $id)->get();

    }*/


    public function GetCityAgainstMainCatEdit($id)
    {
        return city::query()->where('country_id', $id)->get();
    }


    public function filterHomePage($job)
    {


    }

    public function AboutUs()
    {
        # code...
    }

    public function courseByPackage()
    {
        # code...
    }

    public function coursebySchool()
    {
        # code...
    }

    public function courseByCountry()
    {
        # code...
    }

    public function coursesSearch()
    {
        # code...
    }

    public function blog()
    {
        # code...
    }

    public function allServices()
    {
        # code...
    }

    public function serviceBySlug()
    {
        # code...
    }

    public function allArticles()
    {
        # code...
    }

    public function articleBySlug()
    {
        # code...
    }

    public function WhoWeAre()
    {
        # code...
    }

    public function OurPartners()
    {
        # code...
    }

    public function WorkWithUs()
    {
        # code...
    }

    public function RefundPolicy()
    {
        # code...
    }

    public function TermsAndConditions()
    {
        # code...
    }

    public function WhyBookWithUs()
    {
        # code...
    }

    public function Feedback()
    {
        # code...
    }

    public function ContactUs()
    {
        # code...
    }

    public function LanguageTest()
    {
        # code...
    }

    public function FAQ()
    {
        # code...
    }

    public function SiteMap()
    {
        # code...
    }

    /**
     * Get Cites By Id Country
     */
    public function getCites($id)
    {
        $data = city::where('country_id', $id)->where('status', 1)->select('id', 'titleEn', 'titleAr')->get();
        $dataCount = city::where('country_id', $id)->where('status', 1)->count();

        if ($dataCount == 0) {
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

    public function ajaxGetSchoolsByCountry($id)
    {
        $data = schools::where('country_id', $id)->where('status', 1)->get();
        $dataCount = schools::where('country_id', $id)->where('status', 1)->count();
        if ($dataCount == 0) {
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


