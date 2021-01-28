<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\countries;

class SearchController extends Controller
{

    private function clearSearch()
    {
    	return \Session::forget('search');
    }
}
