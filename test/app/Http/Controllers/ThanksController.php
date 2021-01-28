<?php

namespace App\Http\Controllers;
use \App\services;
use \App\nationalities;
use \App\city;
use \App\destination;
use \View;
use Illuminate\Http\Request;

class ThanksController extends Controller
{
	public function __construct()
	{
		$services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        View::share(compact('services','nationalities','cities','destinations'));
	}
    // articles, services
    function general() {
        return view('thank_you');
    }
	
	// feedback
	function feedback() {
        return view('thank_you_feedback');
    }
	
	// newsletter
	function newsletter() {
        return view('thank_you_newsletter');
    }
	
	// contact
	function contact() {
        return view('thank_you_contact');
    }
	
	// partner and work with us
	function partner() {
        return view('thank_you_partner');
    }
}
